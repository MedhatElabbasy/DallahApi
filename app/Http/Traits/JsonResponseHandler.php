<?php

namespace App\Http\Traits;

trait JsonResponseHandler
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($data, $code = 200)
    {
        $data = array_merge(
            ['status' => true],
            $data
        );

        return response()->json($data, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error($code, $message)
    {
        abort($code, $message);
    }

    /**
     * return not found response.
     *
     * @return \Illuminate\Http\Response
     */
    public function notFound($message)
    {
        abort('404', $message);
    }

    /**
     * return no content response.
     *
     * @return \Illuminate\Http\Response
     */
    public function noContent()
    {
        return response()->noContent();
    }
}
