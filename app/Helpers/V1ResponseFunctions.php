<?php

use Illuminate\Http\Request;

/**
 * Get Success
 */
function Response_200(array $payload,Request $request)
{
    return response()->json($payload);
}
/**
 * Post/Patch/Put Success
 */
function Response_201(array $payload,Request $request)
{
    return response()->json($payload,201);
}
/**
 * What you are asking for I just can't do for you
 */
function Response_422(array $payload,Request $request)
{
    return response()->json($payload,422);
}
/**
 * I can't understand your request
 */
function Response_400(array $payload,Request $request)
{
    return response()->json($payload,400);
}
/**
 * You are not allowed to do this either for authentication or authorization issues
 */
function Response_401(array $payload,Request $request)
{
    return response()->json($payload,401);
}