<?php
/**
 * Busca id (que é o numero USP) cadastrados no env
 * @return array
 */
function getAdmins()
{
    return arrayFromConfig(config('seta.admins'));
}

/**
 * Retorna os vinculos cadastrados no env
 * @return array
 */
function getVinculos()
{
    return arrayFromConfig(config('seta.vinculos'));
}

function arrayFromConfig(string $config)
{
    return explode(',', trim($config));
}
