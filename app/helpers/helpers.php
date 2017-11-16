<?php

use App\Http\Flash;
use App\Utility\Utility;
use Illuminate\Support\ViewErrorBag;

function hasError(ViewErrorBag $errors, string $field, bool $input = false)
{
    if ($errors->get($field)) {
        return !$input ? ' has-danger ' : 'form-control-danger';
    }
    return null;
}

function getErrorMessage(ViewErrorBag $errors, string $field)
{
    if ($errors->get($field)) {
        return '<span class="text-danger">' . $errors->first($field) . '</span>';
    }
    return null;
}

/**
 * @param null|string $title
 * @param null|string $message
 * @return Flash|null
 */
function flash(?string $title = null, ?string $message = null)
{
    /** @var Flash $flash */
    $flash = app(Flash::class);
    if (empty(func_get_args())) {
        return $flash;
    }
    return $flash->notice($title, $message);
}

/**
 * @return array
 */
function getStates(): array
{
    return Utility::$sates;
}

function getMonths()
{
    $interval = new DateInterval('P1Y');
    $timesZone = new DateTimeZone('Africa/Conakry');
    $date = (new DateTime('now', $timesZone))->add($interval);
    $dates = [];
    for ($i = 1; $i <= (int)$date->format('m') + 1; $i++) {
        $dates[$i] = DateTime::createFromFormat('Y-m', $date->format('Y') . '-' . $i)->format('F');
    }
    return $dates;
}

function getYears()
{
    $interval = new DateInterval('P10Y');
    $timesZone = new DateTimeZone('Africa/Conakry');
    $date = (new DateTime('now', $timesZone))->add($interval);
    $dates = [];
    for ($i = date('Y'); $i <= (int)$date->format('Y') + 1; $i++) {
        $dates[$i] = DateTime::createFromFormat('Y', $i)->format('Y');
    }
    return $dates;
}

function getValue(?array $array, $key)
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return null;
}
