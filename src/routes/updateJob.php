<?php

$app->post('/api/Dribbble/updateJob', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','jobId']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $accessToken = $post_data['args']['accessToken'];
    $jobId = $post_data['args']['jobId'];

    $data = [];
    if(!empty($post_data['args']['url'])){
        $data['url'] = $post_data['args']['url'];
    }
    if(!empty($post_data['args']['organizationName'])){
        $data['organization_name'] = $post_data['args']['organizationName'];
    }
    if(!empty($post_data['args']['title'])){
        $data['title'] = $post_data['args']['title'];
    }
    if(!empty($post_data['args']['location'])){
        $data['location'] = $post_data['args']['location'];
    }
    if(!empty($post_data['args']['active'])){
        $data['active'] = $post_data['args']['active'];
    }
    if(!empty($post_data['args']['team'])){
        $data['team'] = $post_data['args']['team'];
    }

    $query_str = $settings['api_url'] . "jobs/$jobId";
    $client = $this->httpClient;

    try {

        $resp = $client->put($query_str, [
            "headers" => [
                "Authorization" => "Bearer $accessToken"
            ],
            'form_params' => $data
        ]);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});
