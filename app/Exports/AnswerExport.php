<?php

namespace App\Exports;

use App\Answer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class AnswerExport implements FromView
{
    public function view(): View
    {
        return view('exports.answers', [
            'answers' => Answer::all()
        ]);
    }
}
