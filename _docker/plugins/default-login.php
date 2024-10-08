<?php

class DefaultLogin
{
    /** Print login form.
     */
    public function loginForm()
    {
        echo '<p hidden data-plugin="default-login">Plugin on</p>';
        echo "<table cellspacing='0' class='layout'>";
        echo $this->loginFormField(
            'server',
            'DB_HOST'
        );
        echo $this->loginFormField(
            'driver',
            'DB_CONNECTION',
        );
        echo $this->loginFormField(
            'username',
            'DB_USERNAME',
        );
        echo $this->loginFormField(
            'password',
            'DB_PASSWORD',
        );
        echo $this->loginFormField(
            'db',
            'DB_DATABASE',
        );
        echo '</table>';
        echo "<p><input type='submit' value='Login'>";

        return 0;
    }

    public function loginFormField(string $name, string $envValue = '', string $value = ''): string
    {
        $inputValue = $value;
        if (!empty($envValue) && isset($_ENV[$envValue])) {
            $inputValue = $_ENV[$envValue];
        }

        $nameAttr = "auth[{$name}]";

        return <<<HTML
                <tr>
                    <td>
                        {$name}
                    </td>
                    <td>
                        <input name="{$nameAttr}" value="{$inputValue}" />
                    </td>
                </tr>
            HTML;
    }
}

return new DefaultLogin();
