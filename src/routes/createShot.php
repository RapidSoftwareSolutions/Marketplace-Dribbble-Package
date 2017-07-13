<?php

$app->post('/api/Dribbble/createShot', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','title','image']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $accessToken = $post_data['args']['accessToken'];
    $data['name'] = $post_data['args']['name'];

    if(!empty($post_data['args']['description'])){
        $data['description'] = $post_data['args']['description'];
    }
    if(!empty($post_data['args']['tags'])){
        $data['tags'] = $post_data['args']['tags'];
    }
    if(!empty($post_data['args']['teamId'])){
        $data['team_id'] = $post_data['args']['teamId'];
    }
    if(!empty($post_data['args']['reboundSourceId'])){
        $data['rebound_source_id'] = $post_data['args']['reboundSourceId'];
    }
    if(!empty($post_data['args']['lowProfile'])){
        $data['low_profile'] = $post_data['args']['lowProfile'];
    }

    $query_str = $settings['api_url'] . "shots";
    $client = $this->httpClient;

    try {

        $resp = $client->post($query_str, [
            "headers" => [
                "Authorization" => "Bearer $accessToken",
                "Content-Type"  => "application/x-www-form-urlencoded"
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
