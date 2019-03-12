<?php

namespace Typographus\Profiles;

/**
 *  Профиль типографа
 */
abstract class TypographusProfile
{
    /**
     *  Типографирование
     *
     * @param string $input
     * @return string
     *
     */
    abstract function process($input);

    /**
     * Приводим символы в строке к единой форме для последующей обработки
     *
     * @param string $str
     * @return string
     */
    function normalize($str)
    {
        // Убираем неразрывные пробелы
        $str = preg_replace('~&nbsp;~u', ' ', $str);
        // Приводим кавычки к «"»
        $str = preg_replace('~(„|“|&quot;)~u', '"', $str);

        return html_entity_decode(trim($str), null, 'utf-8');
    }
}
