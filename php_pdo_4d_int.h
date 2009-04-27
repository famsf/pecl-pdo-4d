/*
   +----------------------------------------------------------------------+
   | unknown license:                                                      |
   +----------------------------------------------------------------------+
   | Authors: Stephane Planquart <stephane.planquart@o4db.com>            |
   +----------------------------------------------------------------------+
*/

/* $ Id: $ */ 
#include <fourd.h>
#include <ext/mbstring/mbstring.h>
#define FOURD_CHARSET_SERVEUR "UTF-16LE"

typedef struct {
	const char *file;
	int line;
	unsigned int errcode;
	char *errmsg;
} pdo_4d_error_info;

/* stuff we use in a mySQL database handle */
typedef struct {
	FOURD 		*server;

	unsigned attached:1;
	unsigned buffered:1;
	unsigned emulate_prepare:1;
	unsigned _reserved:31;
	unsigned long max_buffer_size;

	pdo_4d_error_info einfo;
	char* charset;
} pdo_4d_db_handle;


typedef struct {
	FOURD_ELEMENT		*def;
} pdo_fourd_column;

typedef struct {
	pdo_4d_db_handle 	*H;
	FOURD_STATEMENT *state;	
	FOURD_RESULT		*result;
	FOURD_ELEMENT	    *fields;
	int		current_row;
	pdo_4d_error_info einfo;
	char* charset;
	//int num_params;
} pdo_4d_stmt;

extern int _pdo_4d_error(pdo_dbh_t *dbh, pdo_stmt_t *stmt, const char *file, int line TSRMLS_DC);
#define pdo_4d_error(s) _pdo_4d_error(s, NULL, __FILE__, __LINE__ TSRMLS_CC)
#define pdo_4d_error_stmt(s) _pdo_4d_error(stmt->dbh, stmt, __FILE__, __LINE__ TSRMLS_CC)

extern struct pdo_stmt_methods fourd_stmt_methods;


enum {
	PDO_FOURD_ATTR_CHARSET = PDO_ATTR_DRIVER_SPECIFIC,
	PDO_FOURD_ATTR_PREFERRED_IMAGE_TYPES,
	
};