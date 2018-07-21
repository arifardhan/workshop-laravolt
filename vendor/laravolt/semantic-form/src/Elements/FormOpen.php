<?php namespace Laravolt\SemanticForm\Elements;

use Illuminate\Support\Facades\URL;

class FormOpen extends Element
{
    protected $attributes = array(
        'method' => 'POST',
        'action' => '',
        'class'  => 'ui form',
    );

    protected $token;
    protected $hiddenMethod;

    /**
     * FormOpen constructor.
     */
    public function __construct($action = null)
    {
        $this->action($action);

        return $this;
    }

    public function render()
    {
        $result = '<form';
        $result .= $this->renderAttributes();
        $result .= '>';

        if ($this->hasToken()) {
            $result .= $this->token->render();
        }

        if ($this->hasHiddenMethod()) {
            $result .= $this->hiddenMethod->render();
        }

        return $result;
    }

    protected function hasToken()
    {
        return isset($this->token);
    }

    protected function hasHiddenMethod()
    {
        return isset($this->hiddenMethod);
    }

    public function post()
    {
        $this->setMethod('POST');

        return $this;
    }

    public function get()
    {
        $this->setMethod('GET');
        $this->token(false);

        return $this;
    }

    public function put()
    {
        return $this->setHiddenMethod('PUT');
    }

    public function patch()
    {
        return $this->setHiddenMethod('PATCH');
    }

    public function delete()
    {
        return $this->setHiddenMethod('DELETE');
    }

    public function token($token)
    {
        if ($token === false) {
            unset($this->token);

            return $this;
        }

        $this->token = new Hidden('_token');
        $this->token->value($token);

        return $this;
    }

    protected function setHiddenMethod($method)
    {
        $this->setMethod('POST');
        $this->hiddenMethod = new Hidden('_method');
        $this->hiddenMethod->value($method);

        return $this;
    }

    public function setMethod($method)
    {
        $this->setAttribute('method', $method);

        return $this;
    }

    public function action($action)
    {
        $this->setAttribute('action', $action);

        return $this;
    }

    public function route($route, $parameters = [], $absolute = true)
    {
        return $this->action(URL::route($route, $parameters, $absolute));
    }

    public function url($url)
    {
        return $this->action($url);
    }

    public function encodingType($type)
    {
        $this->setAttribute('enctype', $type);

        return $this;
    }

    public function multipart()
    {
        return $this->encodingType('multipart/form-data');
    }
}
