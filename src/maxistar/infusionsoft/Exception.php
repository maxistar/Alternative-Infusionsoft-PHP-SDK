<?php
namespace maxistar\infusionsoft;

class Exception extends \Exception {
    public function __construct($message = null, $method = false, $args = false) {
        $this->error = $message;
        $this->method = $method;
        $this->args = $args;
    }

    public function __toString() {
        $error = "Error from Infusionsoft: {$this->error}<br />";

        if ($this->method)
            $error .= "Method: $this->method<br />";

        if ($this->args)
            $error .= sprintf("Args: <br /><pre>%s</pre>", $this->args_as_string());

        return $error;
    }

    /**
     * Returns the given args as a string
     *
     * @return string
     *
     */
    public function args_as_string() {
        return print_r($this->args, true);
    }
}
