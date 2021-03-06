<?php
abstract class DrPublishApiClientArticleEntity
{
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function __call($name, $arguments)
    {
        if (substr($name, 0, 3) === 'get') {
            $varName = lcfirst(substr($name, 3));
            if (isset($this->{$varName})) {
                return $this->{$varName};
            } else {
                return null;
            }
        }
    }

    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->$name;
        }
        return null;
    }
}