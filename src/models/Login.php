<?php

    class Login extends Model {

        public function validate() {
            
            $errors = [];

            if(!$this->email) {
                $errors['email'] = 'E-mail é um campo obrigatório.';
            }
            

            if(!$this->password) {
                $errors['password'] = 'Por favor, informe a senha.';
            }

            if(count($errors) > 0) {
                throw new ValidationException($errors);
            }

        }

        public function checkLogin() {
            $user = User::getOne(['email' => $this->email]);
            if($user) {
                if(password_verify($this->password, $user->password)) {
                    if($user->end_date) {
                        throw new AppException('Usuário está desligado da empresa.');
                    }
                    return $user;
                }
            }
            
            if($this->email === '') {
                throw new AppException('E-mail é um campo obrigatório');
            } else if ($this->password === '') {
                throw new AppException('Senha é um campo obrigatório');
            } else {
                throw new AppException('Usuário ou Senha inválidos');
            }

        }

    }