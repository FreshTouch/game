<?php  defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Rest
{
    // NOTIFICATION
    const REG_NONE_ERROR = 'Successful registration';
    const LOGIN_NONE_ERROR = 'Successful sign in';
    const ERR_EMAIL = 'Not valid email';
    const ERR_PASS = 'Not valid password';
    const NOT_FOUND = 'User not found';
    const EXISTING_USER = 'Such user already exists';
    const PASS_INVALID = 'The password must be min 6 symbols and max 50 symbols';
    const EMAIL_INVALID = 'Invalid email. Email min 7 letters, max 50 letters';
    const NAME_INVALID = 'NAME only letters and white space allowed. Min 3 letters, max 15 letters';
    const BAD_REQUEST = 'Bad request!!!';
    const TOKEN_LENGTH = 'Token min length 32';
    const TOKEN_NOT_VALID = 'Token is not valid';
    const PERIOD_SUCCESS = 'Successful';
    const NV_GAME_ID = 'Not valid game id';
    const NV_PERIOD_ID = 'Not valid period id';
    const NV_SCORE = 'Not valid score';
    const NV_PARAMS = 'Not valid params';


    // HTTP CODES
    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;
    const HTTP_ALREADY_REPORTED = 208;
    const HTTP_IM_USED = 226;
    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    const HTTP_REQUEST_TIMEOUT = 408;
    const HTTP_CONFLICT = 409;
    const HTTP_GONE = 410;
    const HTTP_LENGTH_REQUIRED = 411;
    const HTTP_PRECONDITION_FAILED = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    const HTTP_REQUEST_URI_TOO_LONG = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const HTTP_EXPECTATION_FAILED = 417;
    const HTTP_I_AM_A_TEAPOT = 418;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_LOCKED = 423;
    const HTTP_FAILED_DEPENDENCY = 424;
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;
    const HTTP_UPGRADE_REQUIRED = 426;
    const HTTP_PRECONDITION_REQUIRED = 428;
    const HTTP_TOO_MANY_REQUESTS = 429;
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;
    const HTTP_INSUFFICIENT_STORAGE = 507;
    const HTTP_LOOP_DETECTED = 508;
    const HTTP_NOT_EXTENDED = 510;
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;

    // VARIABLES
    protected $message;
    protected $status;
    protected $response;

    // METHODS
    protected function set_response()
    {
        $json = array();
        
        if ( empty($this->message) &&
             empty($this->response) &&
             empty($this->status) )
        {
            $json['status'] = self::HTTP_BAD_REQUEST;
            $json['message'] = self::BAD_REQUEST;
        }
        else
        {
            if( ! empty($this->response) )
            {
                $json['response'] = $this->response;
            }
            
            $json['message'] = $this->message;
            $json['status'] = $this->status;
        }
        
        return json_encode($json);
    }
}