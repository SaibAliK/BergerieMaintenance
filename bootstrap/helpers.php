<?php

use Illuminate\Http\Request;

function sendMail($data)
{
    Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
        $message->to($data['to'])->subject($data['subject']);
    });
}
?>