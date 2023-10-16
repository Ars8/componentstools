<?php

namespace App\controllers;

use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyException;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;
use PDO;
use Delight\Auth\Auth;
use function Tamtamchik\SimpleFlash\flash;

class HomeController
{

    private $templates;
    private $auth;
    private $qb;

    public function __construct(QueryBuilder $qb, Engine $engine, Auth $auth)
    {
        $this->qb = $qb;
        $this->templates = $engine;
        $this->auth = $auth;
    }

    public function index()
    {
        d($this->auth);die;
        //$this->auth->login('rahim@marlindev2.ru', '1232');die;
        //$this->auth->logout();die;
        d($this->auth->getRoles());die;
        try {
            $this->auth->admin()->addRoleForUserById(1, \Delight\Auth\Role::ADMIN);   //will refactor
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }
        
        $db = new QueryBuilder();

        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['postsInView' => $posts]);
    }

    public function about()
    {

        try {
            $userId = $this->auth->register('rahim@marlindev23.ru', '12323', 'Rahim23', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function email_verification()
    {
        try {
            $this->auth->confirmEmail('YmveiZ1XBYUGVGTh', 'thSsRPRwqRjUTCh1');

            echo 'Email address has been verified';
        } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        } catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function login()
    {
        try {
            $this->auth->login('rahim@marlindev2.ru', '1232');

            echo 'User is logged in';
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}
