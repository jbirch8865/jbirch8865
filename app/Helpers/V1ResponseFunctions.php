<?php

use Illuminate\Http\Request;

function Response_200(array $payload,Request $request)
{
    return response()->json($payload);
}
function Response_201(array $payload,Request $request)
{
    return response()->json($payload,201);
}
function Response_422(array $payload,Request $request)
{
    return response()->json($payload,422);
}
function Response_400(array $payload,Request $request)
{
    return response()->json($payload,400);
}
function Response_401(array $payload,Request $request)
{
    return response()->json($payload,401);
}