<?php
/**
 * 検索条件等で利用するquery parameterを型変換する処理を記載してください。
 */

if (!function_exists('castForString')) {

    /**
     * stringにキャストして返却
     *
     * @param mixed $value
     * @return string | null
     */
    function castForString($value)
    {
        if (is_null($value) || is_array($value)) return null;

        return (string)$value;
    }
}

if (!function_exists('castForInt')) {
    /**
     * intにキャストして返却
     *
     * @param mixed $value
     * @return int | null
     */
    function castForInt($value)
    {
        if (filter_var($value, FILTER_VALIDATE_INT) === false) return null;

        return (int)$value;
    }
}

if (!function_exists('castForArray')) {

    /**
     * arrayにキャストして返却
     *
     * @param mixed $value
     * @return array | null
     */
    function castForArray($value)
    {
        // 配列以外をnullで返却
        if (!is_array($value)) return null;
        // 空配列だった場合、nullを返却
        if (empty($value)) return null;

        return (array)$value;
    }
}

if (!function_exists('castForBool')) {
    /**
     * boolにキャストして返却
     *
     * @param $value
     * @return bool | null
     */
    function castForBool($value)
    {
        $acceptable = [true, false, 0, 1, '0', '1'];

        if (!in_array($value, $acceptable, true)) return null;

        return (bool)$value;
    }
}

if (!function_exists('castForSearchString')) {

    /**
     * 検索文字列をStringに、特殊文字をエスケープにキャストして返却
     *
     * @param $value
     * @return bool | null
     */
    function castForSearchString($value)
    {

        if (is_null($value) || is_array($value)) return null;

        $value = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $value);

        return castForString($value);
    }
}

if (!function_exists('castForMiddleMatchString')) {

    /**
     * 中間一致用文字列に変換
     *
     * @param $value
     * @return string
     */
    function castForMiddleMatchString($value)
    {
        return castForString('%' . castForSearchString($value) . '%');
    }
}

if (!function_exists('castForSpecifyMatchString')) {

    /**
     * 指定検索用文字列に変換
     *
     * @param $value
     * @return string
     */
    function castForSpecifyMatchString($value)
    {
        $string = castForSearchString($value);
        $leadChecked = preg_replace('/^(\*).*?/i', '%', $string);
        $endChecked = preg_replace('/(\*)$.*?/i', '%', $leadChecked);

        return castForString($endChecked);
    }
}

if (!function_exists('castForFrontMatchString')) {
    /**
     * 前方一致用文字列に変換
     * @param $value
     * @return string|null
     */
    function castForFrontMatchString($value)
    {
        return castForString(castForSearchString($value) . '%');
    }
}
