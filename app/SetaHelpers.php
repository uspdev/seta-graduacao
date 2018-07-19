<?php
/**
 * Busca id (que é o numero USP) cadastrados no env
 * @return array
 */
function getAdmins()
{
    return explode(',', trim(config('CODPES_ADMINS')));
}

