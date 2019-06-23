<?php

namespace App\Http\Controllers\Answer\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Answer;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateController extends Controller
{
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric','digits_between:1,3'],
            'gender' => ['required', Rule::in(['male','female'])],
            'location' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'answer' => ['required', 'array'],
            ]);
    }

    /**
     * Get questions data and return score
     */
    protected function evaluate(array $answers){
        $questions = Question::select('id','answer','correctAnswerRecommendation','wrongAnswerRecommendation','question')->get();
        return $this->calculate($answers,$questions->toArray());
    }

    /**
     * Evaluate each answer and return calculated score
     */
    protected function calculate(array $answers, array $correctAnswers){
        $score=0;
        $recommendations = []; 
        for ($i=0; $i < count($correctAnswers); $i++) { 
            $correctAnswer = (Object) $correctAnswers[$i];
            for ($j=0; $j < count($answers); $j++) { 
                $answer = (Object) $answers[$j];
                if($answer->id == $correctAnswer->id){
                    if($answer->answer==$correctAnswer->answer){
                        $score+=1;
                        $temp = (object)['id'=>$correctAnswer->id,'question'=>$correctAnswer->question,'recommendation'=>$correctAnswer->correctAnswerRecommendation];
                        array_push($recommendations,$temp);
                    }
                    else{
                        $temp = (object) ['id'=>$correctAnswer->id,'question'=>$correctAnswer->question,'recommendation'=>$correctAnswer->wrongAnswerRecommendation];
                        array_push($recommendations,$temp);
                    }
                    array_splice($answers,$j,1);
                    break;
                }
            }
        }
        return array('score'=>$score,'recommendations'=>$recommendations);
    }

    public function create(Request $request){
        $validation = $this->validator($request->all());
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $result = $this->evaluate($request->answer);
        $data = Answer::create(
            array_merge(
                $request->all(),
                ['score'=>$result['score']]
                )
            );
        return response()->json(['message'=>'create answer success','status'=>201,'result'=>$result],201);
    }
}
