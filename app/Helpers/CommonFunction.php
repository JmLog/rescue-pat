<?php

//# Response Data
if (!function_exists('responseData')) {
    function responseData($code = 200, $data = [], $message = ''): \Illuminate\Http\JsonResponse
    {
        $res = [
            'code' => $code,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($res);
    }
}
