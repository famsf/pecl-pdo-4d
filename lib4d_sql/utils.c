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
#include <string.h>
#define isspace(x) (x==' ')
char *strstrip(char *s)
{
       size_t size;
       char *end;

       size = strlen(s);

       if (!size)
               return s;

       end = s + size - 1;
       while (end != s && isspace(*end))
               end--;
       *(end + 1) = '\0';

       while (*s && isspace(*s))
               s++;

       return s;
}