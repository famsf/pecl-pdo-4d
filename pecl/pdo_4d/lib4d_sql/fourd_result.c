/***********************************************************************
    (C) Copyright 2009 Stephane Planquart

    These sources is free software. They are published under any of 
    the following licences : 
    APACHE
    BSD
    GNU
    LGPL
    PHP

    These sources is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY. Without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

    You may contact the author by:
       e-mail:  splanquart@php.net
       e-mail:  fourd@php.net
*************************************************************************/
#include "fourd.h"
#include "fourd_int.h"
FOURD_LONG8 fourd_num_rows(FOURD_RESULT *result)
{
	return result->row_count;
}