<?php
function get_image_from_url($url) {
	$get_function = new get_images();
	$raw_urls = @$get_function->getimages($url);
	usort($raw_urls, function($a, $b) {
		return $b['height'] + $b['width'] - $a['height'] - $a['width'];
	});
	return array($raw_urls, $get_function->htmltitle);
}
class Get_images{
	function __construct(){
		$this->compareimages = array();
		$this->htmltitle = '';
	}
	function url_to_absolute( $baseUrl, $relativeUrl )
{
	// If relative URL has a scheme, clean path and return.
	$r = $this->split_url( $relativeUrl );
	if ( $r === FALSE )
		return FALSE;
	if ( !empty( $r['scheme'] ) )
	{
		if ( !empty( $r['path'] ) && $r['path'][0] == '/' )
			$r['path'] = $this->url_remove_dot_segments( $r['path'] );
		return $this->join_url( $r );
	}

	// Make sure the base URL is absolute.
	$b = $this->split_url( $baseUrl );
	if ( $b === FALSE || empty( $b['scheme'] ) || empty( $b['host'] ) )
		return FALSE;
	$r['scheme'] = $b['scheme'];

	// If relative URL has an authority, clean path and return.
	if ( isset( $r['host'] ) )
	{
		if ( !empty( $r['path'] ) )
			$r['path'] = $this->url_remove_dot_segments( $r['path'] );
		return $this->join_url( $r );
	}
	unset( $r['port'] );
	unset( $r['user'] );
	unset( $r['pass'] );

	// Copy base authority.
	$r['host'] = $b['host'];
	if ( isset( $b['port'] ) ) $r['port'] = $b['port'];
	if ( isset( $b['user'] ) ) $r['user'] = $b['user'];
	if ( isset( $b['pass'] ) ) $r['pass'] = $b['pass'];

	// If relative URL has no path, use base path
	if ( empty( $r['path'] ) )
	{
		if ( !empty( $b['path'] ) )
			$r['path'] = $b['path'];
		if ( !isset( $r['query'] ) && isset( $b['query'] ) )
			$r['query'] = $b['query'];
		return $this->join_url( $r );
	}

	// If relative URL path doesn't start with /, merge with base path
	if ( $r['path'][0] != '/' )
	{
		$base = mb_strrchr( $b['path'], '/', TRUE, 'UTF-8' );
		if ( $base === FALSE ) $base = '';
		$r['path'] = $base . '/' . $r['path'];
	}
	$r['path'] = $this->url_remove_dot_segments( $r['path'] );
	return $this->join_url( $r );
}

/**
 * Filter out "." and ".." segments from a URL's path and return
 * the result.
 *
 * This function implements the "remove_dot_segments" algorithm from
 * the RFC3986 specification for URLs.
 *
 * This function supports multi-byte characters with the UTF-8 encoding,
 * per the URL specification.
 *
 * Parameters:
 * 	path	the path to filter
 *
 * Return values:
 * 	The filtered path with "." and ".." removed.
 */
function url_remove_dot_segments( $path )
{
	// multi-byte character explode
	$inSegs  = preg_split( '!/!u', $path );
	$outSegs = array( );
	foreach ( $inSegs as $seg )
	{
		if ( $seg == '' || $seg == '.')
			continue;
		if ( $seg == '..' )
			array_pop( $outSegs );
		else
			array_push( $outSegs, $seg );
	}
	$outPath = implode( '/', $outSegs );
	if ( $path[0] == '/' )
		$outPath = '/' . $outPath;
	// compare last multi-byte character against '/'
	if ( $outPath != '/' &&
		(mb_strlen($path)-1) == mb_strrpos( $path, '/', 'UTF-8' ) )
		$outPath .= '/';
	return $outPath;
}


/**
 * This function parses an absolute or relative URL and splits it
 * into individual components.
 *
 * RFC3986 specifies the components of a Uniform Resource Identifier (URI).
 * A portion of the ABNFs are repeated here:
 *
 *	URI-reference	= URI
 *			/ relative-ref
 *
 *	URI		= scheme ":" hier-part [ "?" query ] [ "#" fragment ]
 *
 *	relative-ref	= relative-part [ "?" query ] [ "#" fragment ]
 *
 *	hier-part	= "//" authority path-abempty
 *			/ path-absolute
 *			/ path-rootless
 *			/ path-empty
 *
 *	relative-part	= "//" authority path-abempty
 *			/ path-absolute
 *			/ path-noscheme
 *			/ path-empty
 *
 *	authority	= [ userinfo "@" ] host [ ":" port ]
 *
 * So, a URL has the following major components:
 *
 *	scheme
 *		The name of a method used to interpret the rest of
 *		the URL.  Examples:  "http", "https", "mailto", "file'.
 *
 *	authority
 *		The name of the authority governing the URL's name
 *		space.  Examples:  "example.com", "user@example.com",
 *		"example.com:80", "user:password@example.com:80".
 *
 *		The authority may include a host name, port number,
 *		user name, and password.
 *
 *		The host may be a name, an IPv4 numeric address, or
 *		an IPv6 numeric address.
 *
 *	path
 *		The hierarchical path to the URL's resource.
 *		Examples:  "/index.htm", "/scripts/page.php".
 *
 *	query
 *		The data for a query.  Examples:  "?search=google.com".
 *
 *	fragment
 *		The name of a secondary resource relative to that named
 *		by the path.  Examples:  "#section1", "#header".
 *
 * An "absolute" URL must include a scheme and path.  The authority, query,
 * and fragment components are optional.
 *
 * A "relative" URL does not include a scheme and must include a path.  The
 * authority, query, and fragment components are optional.
 *
 * This function splits the $url argument into the following components
 * and returns them in an associative array.  Keys to that array include:
 *
 *	"scheme"	The scheme, such as "http".
 *	"host"		The host name, IPv4, or IPv6 address.
 *	"port"		The port number.
 *	"user"		The user name.
 *	"pass"		The user password.
 *	"path"		The path, such as a file path for "http".
 *	"query"		The query.
 *	"fragment"	The fragment.
 *
 * One or more of these may not be present, depending upon the URL.
 *
 * Optionally, the "user", "pass", "host" (if a name, not an IP address),
 * "path", "query", and "fragment" may have percent-encoded characters
 * decoded.  The "scheme" and "port" cannot include percent-encoded
 * characters and are never decoded.  Decoding occurs after the URL has
 * been parsed.
 *
 * Parameters:
 * 	url		the URL to parse.
 *
 * 	decode		an optional boolean flag selecting whether
 * 			to decode percent encoding or not.  Default = TRUE.
 *
 * Return values:
 * 	the associative array of URL parts, or FALSE if the URL is
 * 	too malformed to recognize any parts.
 */
function split_url( $url, $decode=FALSE)
{
	// Character sets from RFC3986.
	$xunressub     = 'a-zA-Z\d\-._~\!$&\'()*+,;=';
	$xpchar        = $xunressub . ':@% ';

	// Scheme from RFC3986.
	$xscheme        = '([a-zA-Z][a-zA-Z\d+-.]*)';

	// User info (user + password) from RFC3986.
	$xuserinfo     = '((['  . $xunressub . '%]*)' .
	                 '(:([' . $xunressub . ':%]*))?)';

	// IPv4 from RFC3986 (without digit constraints).
	$xipv4         = '(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})';

	// IPv6 from RFC2732 (without digit and grouping constraints).
	$xipv6         = '(\[([a-fA-F\d.:]+)\])';

	// Host name from RFC1035.  Technically, must start with a letter.
	// Relax that restriction to better parse URL structure, then
	// leave host name validation to application.
	$xhost_name    = '([a-zA-Z\d-.%]+)';

	// Authority from RFC3986.  Skip IP future.
	$xhost         = '(' . $xhost_name . '|' . $xipv4 . '|' . $xipv6 . ')';
	$xport         = '(\d*)';
	$xauthority    = '((' . $xuserinfo . '@)?' . $xhost .
		         '?(:' . $xport . ')?)';

	// Path from RFC3986.  Blend absolute & relative for efficiency.
	$xslash_seg    = '(/[' . $xpchar . ']*)';
	$xpath_authabs = '((//' . $xauthority . ')((/[' . $xpchar . ']*)*))';
	$xpath_rel     = '([' . $xpchar . ']+' . $xslash_seg . '*)';
	$xpath_abs     = '(/(' . $xpath_rel . ')?)';
	$xapath        = '(' . $xpath_authabs . '|' . $xpath_abs .
			 '|' . $xpath_rel . ')';

	// Query and fragment from RFC3986.
	$xqueryfrag    = '([' . $xpchar . '/?' . ']*)';

	// URL.
	$xurl          = '^(' . $xscheme . ':)?' .  $xapath . '?' .
	                 '(\?' . $xqueryfrag . ')?(#' . $xqueryfrag . ')?$';


	// Split the URL into components.
	if ( !preg_match( '!' . $xurl . '!', $url, $m ) )
		return FALSE;

	if ( !empty($m[2]) )		$parts['scheme']  = strtolower($m[2]);

	if ( !empty($m[7]) ) {
		if ( isset( $m[9] ) )	$parts['user']    = $m[9];
		else			$parts['user']    = '';
	}
	if ( !empty($m[10]) )		$parts['pass']    = $m[11];

	if ( !empty($m[13]) )		$h=$parts['host'] = $m[13];
	else if ( !empty($m[14]) )	$parts['host']    = $m[14];
	else if ( !empty($m[16]) )	$parts['host']    = $m[16];
	else if ( !empty( $m[5] ) )	$parts['host']    = '';
	if ( !empty($m[17]) )		$parts['port']    = $m[18];

	if ( !empty($m[19]) )		$parts['path']    = $m[19];
	else if ( !empty($m[21]) )	$parts['path']    = $m[21];
	else if ( !empty($m[25]) )	$parts['path']    = $m[25];

	if ( !empty($m[27]) )		$parts['query']   = $m[28];
	if ( !empty($m[29]) )		$parts['fragment']= $m[30];

	if ( !$decode )
		return $parts;
	if ( !empty($parts['user']) )
		$parts['user']     = rawurldecode( $parts['user'] );
	if ( !empty($parts['pass']) )
		$parts['pass']     = rawurldecode( $parts['pass'] );
	if ( !empty($parts['path']) )
		$parts['path']     = rawurldecode( $parts['path'] );
	if ( isset($h) )
		$parts['host']     = rawurldecode( $parts['host'] );
	if ( !empty($parts['query']) )
		$parts['query']    = rawurldecode( $parts['query'] );
	if ( !empty($parts['fragment']) )
		$parts['fragment'] = rawurldecode( $parts['fragment'] );
	return $parts;
}


/**
 * This function joins together URL components to form a complete URL.
 *
 * RFC3986 specifies the components of a Uniform Resource Identifier (URI).
 * This function implements the specification's "component recomposition"
 * algorithm for combining URI components into a full URI string.
 *
 * The $parts argument is an associative array containing zero or
 * more of the following:
 *
 *	"scheme"	The scheme, such as "http".
 *	"host"		The host name, IPv4, or IPv6 address.
 *	"port"		The port number.
 *	"user"		The user name.
 *	"pass"		The user password.
 *	"path"		The path, such as a file path for "http".
 *	"query"		The query.
 *	"fragment"	The fragment.
 *
 * The "port", "user", and "pass" values are only used when a "host"
 * is present.
 *
 * The optional $encode argument indicates if appropriate URL components
 * should be percent-encoded as they are assembled into the URL.  Encoding
 * is only applied to the "user", "pass", "host" (if a host name, not an
 * IP address), "path", "query", and "fragment" components.  The "scheme"
 * and "port" are never encoded.  When a "scheme" and "host" are both
 * present, the "path" is presumed to be hierarchical and encoding
 * processes each segment of the hierarchy separately (i.e., the slashes
 * are left alone).
 *
 * The assembled URL string is returned.
 *
 * Parameters:
 * 	parts		an associative array of strings containing the
 * 			individual parts of a URL.
 *
 * 	encode		an optional boolean flag selecting whether
 * 			to do percent encoding or not.  Default = true.
 *
 * Return values:
 * 	Returns the assembled URL string.  The string is an absolute
 * 	URL if a scheme is supplied, and a relative URL if not.  An
 * 	empty string is returned if the $parts array does not contain
 * 	any of the needed values.
 */
function join_url( $parts, $encode=FALSE)
{
	if ( $encode )
	{
		if ( isset( $parts['user'] ) )
			$parts['user']     = rawurlencode( $parts['user'] );
		if ( isset( $parts['pass'] ) )
			$parts['pass']     = rawurlencode( $parts['pass'] );
		if ( isset( $parts['host'] ) &&
			!preg_match( '!^(\[[\da-f.:]+\]])|([\da-f.:]+)$!ui', $parts['host'] ) )
			$parts['host']     = rawurlencode( $parts['host'] );
		if ( !empty( $parts['path'] ) )
			$parts['path']     = preg_replace( '!%2F!ui', '/',
				rawurlencode( $parts['path'] ) );
		if ( isset( $parts['query'] ) )
			$parts['query']    = rawurlencode( $parts['query'] );
		if ( isset( $parts['fragment'] ) )
			$parts['fragment'] = rawurlencode( $parts['fragment'] );
	}

	$url = '';
	if ( !empty( $parts['scheme'] ) )
		$url .= $parts['scheme'] . ':';
	if ( isset( $parts['host'] ) )
	{
		$url .= '//';
		if ( isset( $parts['user'] ) )
		{
			$url .= $parts['user'];
			if ( isset( $parts['pass'] ) )
				$url .= ':' . $parts['pass'];
			$url .= '@';
		}
		if ( preg_match( '!^[\da-f]*:[\da-f.:]+$!ui', $parts['host'] ) )
			$url .= '[' . $parts['host'] . ']';	// IPv6
		else
			$url .= $parts['host'];			// IPv4 or name
		if ( isset( $parts['port'] ) )
			$url .= ':' . $parts['port'];
		if ( !empty( $parts['path'] ) && $parts['path'][0] != '/' )
			$url .= '/';
	}
	if ( !empty( $parts['path'] ) )
		$url .= $parts['path'];
	if ( isset( $parts['query'] ) )
		$url .= '?' . $parts['query'];
	if ( isset( $parts['fragment'] ) )
		$url .= '#' . $parts['fragment'];
	return $url;
}

/**
 * This function encodes URL to form a URL which is properly 
 * percent encoded to replace disallowed characters.
 *
 * RFC3986 specifies the allowed characters in the URL as well as
 * reserved characters in the URL. This function replaces all the 
 * disallowed characters in the URL with their repective percent 
 * encodings. Already encoded characters are not encoded again,
 * such as '%20' is not encoded to '%2520'.
 *
 * Parameters:
 * 	url		the url to encode.
 *
 * Return values:
 * 	Returns the encoded URL string. 
 */
function encode_url($url) {
  $reserved = array(
    ":" => '!%3A!ui',
    "/" => '!%2F!ui',
    "?" => '!%3F!ui',
    "#" => '!%23!ui',
    "[" => '!%5B!ui',
    "]" => '!%5D!ui',
    "@" => '!%40!ui',
    "!" => '!%21!ui',
    "$" => '!%24!ui',
    "&" => '!%26!ui',
    "'" => '!%27!ui',
    "(" => '!%28!ui',
    ")" => '!%29!ui',
    "*" => '!%2A!ui',
    "+" => '!%2B!ui',
    "," => '!%2C!ui',
    ";" => '!%3B!ui',
    "=" => '!%3D!ui',
    "%" => '!%25!ui',
  );

  $url = rawurlencode($url);
  $url = preg_replace(array_values($reserved), array_keys($reserved), $url);
  return $url;
}


function urlload($url,$options=array()) {
    $default_options = array(
        'method'        => 'get',
        'post_data'        => false,
        'return_info'    => false,
        'return_body'    => true,
        'cache'            => false,
        'referer'        => '',
        'headers'        => array(),
        'session'        => false,
        'session_close'    => false,
    );
    // Sets the default options.
    foreach($default_options as $opt=>$value) {
        if(!isset($options[$opt])) $options[$opt] = $value;
    }

    $url_parts = parse_url($url);
    $ch = false;
    $info = array(//Currently only supported by curl.
        'http_code'    => 200
    );
    $response = '';
    
    $send_header = array(
        'Accept' => 'text/*',
        'User-Agent' => 'BinGet/1.00.A (http://www.bin-co.com/php/scripts/load/)'
    ) + $options['headers']; // Add custom headers provided by the user.
    
    if($options['cache']) {
        $cache_folder = joinPath(sys_get_temp_dir(), 'php-load-function');
        if(isset($options['cache_folder'])) $cache_folder = $options['cache_folder'];
        if(!file_exists($cache_folder)) {
            $old_umask = umask(0); // Or the folder will not get write permission for everybody.
            mkdir($cache_folder, 0777);
            umask($old_umask);
        }
        
        $cache_file_name = md5($url) . '.cache';
        $cache_file = joinPath($cache_folder, $cache_file_name); //Don't change the variable name - used at the end of the function.
        
        if(file_exists($cache_file)) { // Cached file exists - return that.
            $response = file_get_contents($cache_file);
            
            //Seperate header and content
            $separator_position = strpos($response,"\r\n\r\n");
            $header_text = substr($response,0,$separator_position);
            $body = substr($response,$separator_position+4);
            
            foreach(explode("\n",$header_text) as $line) {
                $parts = explode(": ",$line);
                if(count($parts) == 2) $headers[$parts[0]] = chop($parts[1]);
            }
            $headers['cached'] = true;
            
            if(!$options['return_info']) return $body;
            else return array('headers' => $headers, 'body' => $body, 'info' => array('cached'=>true));
        }
    }

    if(isset($options['post_data'])) { //There is an option to specify some data to be posted.
        $options['method'] = 'post';
        
        if(is_array($options['post_data'])) { //The data is in array format.
            $post_data = array();
            foreach($options['post_data'] as $key=>$value) {
                $post_data[] = "$key=" . urlencode($value);
            }
            $url_parts['query'] = implode('&', $post_data);
        } else { //Its a string
            $url_parts['query'] = $options['post_data'];
        }
    } elseif(isset($options['multipart_data'])) { //There is an option to specify some data to be posted.
        $options['method'] = 'post';
        $url_parts['query'] = $options['multipart_data'];
        /*
            This array consists of a name-indexed set of options.
            For example,
            'name' => array('option' => value)
            Available options are:
            filename: the name to report when uploading a file.
            type: the mime type of the file being uploaded (not used with curl).
            binary: a flag to tell the other end that the file is being uploaded in binary mode (not used with curl).
            contents: the file contents. More efficient for fsockopen if you already have the file contents.
            fromfile: the file to upload. More efficient for curl if you don't have the file contents.

            Note the name of the file specified with fromfile overrides filename when using curl.
         */
    }

    ///////////////////////////// Curl /////////////////////////////////////
    //If curl is available, use curl to get the data.
    if(function_exists("curl_init") 
                and (!(isset($options['use']) and $options['use'] == 'fsocketopen'))) { //Don't use curl if it is specifically stated to use fsocketopen in the options
        
        if(isset($options['post_data'])) { //There is an option to specify some data to be posted.
            $page = $url;
            $options['method'] = 'post';
            
            if(is_array($options['post_data'])) { //The data is in array format.
                $post_data = array();
                foreach($options['post_data'] as $key=>$value) {
                    $post_data[] = "$key=" . urlencode($value);
                }
                $url_parts['query'] = implode('&', $post_data);
            
            } else { //Its a string
                $url_parts['query'] = $options['post_data'];
            }
        } else {
            if(isset($options['method']) and $options['method'] == 'post') {
                $page = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];
            } else {
                $page = $url;
            }
        }

        if($options['session'] and isset($GLOBALS['_binget_curl_session'])) $ch = $GLOBALS['_binget_curl_session']; //Session is stored in a global variable
        else $ch = curl_init($url_parts['host']);
        
        curl_setopt($ch, CURLOPT_URL, $page) or die("Invalid cURL Handle Resouce");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Just return the data - not print the whole thing.
        curl_setopt($ch, CURLOPT_HEADER, true); //We need the headers
        curl_setopt($ch, CURLOPT_NOBODY, !($options['return_body'])); //The content - if true, will not download the contents. There is a ! operation - don't remove it.
        $tmpdir = NULL; //This acts as a flag for us to clean up temp files
        if(isset($options['method']) and $options['method'] == 'post' and isset($url_parts['query'])) {
            curl_setopt($ch, CURLOPT_POST, true);
            if(is_array($url_parts['query'])) {
                //multipart form data (eg. file upload)
                $postdata = array();
                foreach ($url_parts['query'] as $name => $data) {
                    if (isset($data['contents']) && isset($data['filename'])) {
                        if (!isset($tmpdir)) { //If the temporary folder is not specifed - and we want to upload a file, create a temp folder.
                            //  :TODO:
                            $dir = sys_get_temp_dir();
                            $prefix = 'load';
                            
                            if (substr($dir, -1) != '/') $dir .= '/';
                            do {
                                $path = $dir . $prefix . mt_rand(0, 9999999);
                            } while (!mkdir($path, $mode));
                        
                            $tmpdir = $path;
                        }
                        $tmpfile = $tmpdir.'/'.$data['filename'];
                        file_put_contents($tmpfile, $data['contents']);
                        $data['fromfile'] = $tmpfile;
                    }
                    if (isset($data['fromfile'])) {
                        // Not sure how to pass mime type and/or the 'use binary' flag
                        $postdata[$name] = '@'.$data['fromfile'];
                    } elseif (isset($data['contents'])) {
                        $postdata[$name] = $data['contents'];
                    } else {
                        $postdata[$name] = '';
                    }
                }
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $url_parts['query']);
            }
        }

        //Set the headers our spiders sends
        curl_setopt($ch, CURLOPT_USERAGENT, $send_header['User-Agent']); //The Name of the UserAgent we will be using ;)
        $custom_headers = array("Accept: " . $send_header['Accept'] );
        if(isset($options['modified_since']))
            array_push($custom_headers,"If-Modified-Since: ".gmdate('D, d M Y H:i:s \G\M\T',strtotime($options['modified_since'])));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $custom_headers);
        if($options['referer']) curl_setopt($ch, CURLOPT_REFERER, $options['referer']);

        curl_setopt($ch, CURLOPT_COOKIEJAR, "/tmp/binget-cookie.txt"); //If ever needed...
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $custom_headers = array();
        unset($send_header['User-Agent']); // Already done (above)
        foreach ($send_header as $name => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $custom_headers[] = "$name: $item";
                }
            } else {
                $custom_headers[] = "$name: $value";
            }
        }
        if(isset($url_parts['user']) and isset($url_parts['pass'])) {
            $custom_headers[] = "Authorization: Basic ".base64_encode($url_parts['user'].':'.$url_parts['pass']);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $custom_headers);

        $response = curl_exec($ch);

        if(isset($tmpdir)) {
            //rmdirr($tmpdir); //Cleanup any temporary files :TODO:
        }

        $info = curl_getinfo($ch); //Some information on the fetch
        
        if($options['session'] and !$options['session_close']) $GLOBALS['_binget_curl_session'] = $ch; //Dont close the curl session. We may need it later - save it to a global variable
        else curl_close($ch);  //If the session option is not set, close the session.

    //////////////////////////////////////////// FSockOpen //////////////////////////////
    } else { //If there is no curl, use fsocketopen - but keep in mind that most advanced features will be lost with this approch.

        if(!isset($url_parts['query']) || (isset($options['method']) and $options['method'] == 'post'))
            $page = $url_parts['path'];
        else
            $page = $url_parts['path'] . '?' . $url_parts['query'];
        
        if(!isset($url_parts['port'])) $url_parts['port'] = ($url_parts['scheme'] == 'https' ? 443 : 80);
        $host = ($url_parts['scheme'] == 'https' ? 'ssl://' : '').$url_parts['host'];
        $fp = fsockopen($host, $url_parts['port'], $errno, $errstr, 30);
        if ($fp) {
            $out = '';
            if(isset($options['method']) and $options['method'] == 'post' and isset($url_parts['query'])) {
                $out .= "POST $page HTTP/1.1\r\n";
            } else {
                $out .= "GET $page HTTP/1.0\r\n"; //HTTP/1.0 is much easier to handle than HTTP/1.1
            }
            $out .= "Host: $url_parts[host]\r\n";
        foreach ($send_header as $name => $value) {
        if (is_array($value)) {
            foreach ($value as $item) {
            $out .= "$name: $item\r\n";
            }
        } else {
            $out .= "$name: $value\r\n";
        }
        }
            $out .= "Connection: Close\r\n";
            
            //HTTP Basic Authorization support
            if(isset($url_parts['user']) and isset($url_parts['pass'])) {
                $out .= "Authorization: Basic ".base64_encode($url_parts['user'].':'.$url_parts['pass']) . "\r\n";
            }

            //If the request is post - pass the data in a special way.
            if(isset($options['method']) and $options['method'] == 'post') {
                if(is_array($url_parts['query'])) {
                    //multipart form data (eg. file upload)

                    // Make a random (hopefully unique) identifier for the boundary
                    srand((double)microtime()*1000000);
                    $boundary = "---------------------------".substr(md5(rand(0,32000)),0,10);

                    $postdata = array();
                    $postdata[] = '--'.$boundary;
                    foreach ($url_parts['query'] as $name => $data) {
                        $disposition = 'Content-Disposition: form-data; name="'.$name.'"';
                        if (isset($data['filename'])) {
                            $disposition .= '; filename="'.$data['filename'].'"';
                        }
                        $postdata[] = $disposition;
                        if (isset($data['type'])) {
                            $postdata[] = 'Content-Type: '.$data['type'];
                        }
                        if (isset($data['binary']) && $data['binary']) {
                            $postdata[] = 'Content-Transfer-Encoding: binary';
                        } else {
                            $postdata[] = '';
                        }
                        if (isset($data['fromfile'])) {
                            $data['contents'] = file_get_contents($data['fromfile']);
                        }
                        if (isset($data['contents'])) {
                            $postdata[] = $data['contents'];
                        } else {
                            $postdata[] = '';
                        }
                        $postdata[] = '--'.$boundary;
                    }
                    $postdata = implode("\r\n", $postdata)."\r\n";
                    $length = strlen($postdata);
                    $postdata = 'Content-Type: multipart/form-data; boundary='.$boundary."\r\n".
                                'Content-Length: '.$length."\r\n".
                                "\r\n".
                                $postdata;

                    $out .= $postdata;
                } else {
                    $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
                    $out .= 'Content-Length: ' . strlen($url_parts['query']) . "\r\n";
                    $out .= "\r\n" . $url_parts['query'];
                }
            }
            $out .= "\r\n";

            fwrite($fp, $out);
            while (!feof($fp)) {
                $response .= fgets($fp, 128);
            }
            fclose($fp);
        }
    }

    //Get the headers in an associative array
    $headers = array();

    if($info['http_code'] == 404) {
        $body = "";
        $headers['Status'] = 404;
    } else {
        //Seperate header and content
        $header_text = substr($response, 0, $info['header_size']);
        $body = substr($response, $info['header_size']);
        
        foreach(explode("\n",$header_text) as $line) {
            $parts = explode(": ",$line);
            if(count($parts) == 2) {
                if (isset($headers[$parts[0]])) {
                    if (is_array($headers[$parts[0]])) $headers[$parts[0]][] = chop($parts[1]);
                    else $headers[$parts[0]] = array($headers[$parts[0]], chop($parts[1]));
                } else {
                    $headers[$parts[0]] = chop($parts[1]);
                }
            }
        }

    }
    
    if(isset($cache_file)) { //Should we cache the URL?
        file_put_contents($cache_file, $response);
    }

    if($options['return_info']) return array('headers' => $headers, 'body' => $body, 'info' => $info, 'curl_handle'=>$ch);
    return $body;
}

	function getimagesize_remote( $image_url ) {

		//$image_url = urlencode($image_url);

		$handle = fopen ($image_url, "rb");
		$contents = "";
		if ($handle) {
			do {
				$count += 1;
				$data = fread($handle, 8192);
				if (strlen($data) == 0) {
					break;
				}
				$contents .= $data;
			} while(true);
			$im = ImageCreateFromString($contents);
			fclose ($handle);
		}


		if (!$im) { 
    			$ch = curl_init ($image_url);
    			curl_setopt($ch, CURLOPT_HEADER, 0);
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    			$raw=curl_exec($ch);
    			curl_close ($ch);			
			$im = ImageCreateFromString($raw);
		}

		//if (!$im) {
		//	$raw = file_get_contents($image_url);
		//	$im = ImageCreateFromString($raw);
		//}

		if (!$im) { return false; }

		$gis[0] = ImageSX($im);
		$gis[1] = ImageSY($im);
		ImageDestroy($im);
		return $gis;
	}

	function get_web_page( $url ){
    	    $options = array(
        	CURLOPT_RETURNTRANSFER => true,     // return web page
	        CURLOPT_HEADER         => false,    // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
	        CURLOPT_ENCODING       => "",       // handle all encodings
	        CURLOPT_USERAGENT      => "spider", // who am i
	        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
	        CURLOPT_TIMEOUT        => 120,      // timeout on response
	        CURLOPT_MAXREDIRS      => 20,       // stop after 20 redirects
	    );

	    $ch      = curl_init( $url );
	    curl_setopt_array( $ch, $options );
	    $content = curl_exec( $ch );
	    $err     = curl_errno( $ch );
	    $errmsg  = curl_error( $ch );
	    $header  = curl_getinfo( $ch );
	    curl_close( $ch );

	    $header['errno']   = $err;
	    $header['errmsg']  = $errmsg;
	    $header['content'] = $content;
	    return $header;
	}

	function addtoarray($imgurl, $ret) {
		$width = 200; 
		$height = 200;
		if (in_array ($imgurl, $this->compareimages)) {
			//ok already exists
		} else {
			$this->compareimages[] = $imgurl;
			list($width, $height, $type, $attr) = getimagesize($imgurl);
			if (!($width > 0)) {
				list($width, $height) = $this->getimagesize_remote($imgurl);
			}
			if ((($height >= 50) && ($width >= 50) && ($height + $width >= 100)) /* || trim($width) == "" */) {
				
				if (trim($width) == "") {
					$width = -1; //101;
					$height = -1; //101;
				}
				$can_be_insert = ($height / $width <= 4)&&($width / $height <= 3);
				if ($can_be_insert) {
					$img_url = array();
					$img_url['image_path'] = $imgurl;
					$img_url['height'] = $height;
					$img_url['width'] = $width;
					if (!in_array ($img_url, $ret)) {
						$ret[] = $img_url;
					}
				}
			}
		}
		return $ret;
	}

	function url_to_absolutex1($url, $temp) {
		if (substr(trim($temp), 0, 2) == "//") {
			return $temp;
		} else {
			return $this->url_to_absolute($url, $temp);
		}
	}

	function url_to_absolutex($url, $temp, $ret) {

		$temp1 = $this->url_to_absolutex1($url, $temp);
		if ($temp1 !== false) {
			//$ret[] = $temp1;
			$ret = $this->addtoarray($temp1, $ret);
		} else {
			$url = str_replace('\/', '/', $url);
			$temp = str_replace('\/', '/', $temp);
			$url = str_replace('\\', '/', $url);
			$temp = str_replace('\\', '/', $temp);

			$temp2 = $this->url_to_absolutex1($url, $temp);			
			if ($temp2 !== false) {
				$ret = $this->addtoarray($temp2, $ret);
			} else {
				//echo "false !!! $url & $temp <br>\n";
			}
		}
		return $ret;
	}

	function possibleimage($temp, $endpos, $url, $ret) {
		$find = "";
		$find2 = "";
		$minus = 1;
		$checkchar = substr($temp, $endpos, 1);
		if ((($checkchar >= "a") && ($checkchar <= "z")) 
		  || (($checkchar >= "A") && ($checkchar <= "Z")) 
		  || ($checkchar == "-") || ($checkchar == "_") || ($checkchar == ".")) {
			return $ret;
		} else {
			$find = '';
			$find2 = '';
			$find3 = '';
			switch ($checkchar) {
				case "'": 
					$find = "'";
					break;
				case '"': 
					$find = '"';
					break;
				case ")":
					$find = '(';
					break;	
				case "]":
					$find = '[';
					break;	
				case "}":
					$find = '{';
					break;	
				case " ":
				case ">":
					$find = ' ';
					$find2 = '=';
					break;
				case "/":
					if (substr(trim(substr($temp, $endpos + 2)), 0, 1) == ">") {
						$find = ' ';
						$find2 = '=';
						$minus = 2;
					}
					break;
				default:
					$find = ' ';
					$find2 = '=';
					$find3 = $checkchar;
					break;														
			}
		}
		$pos1 = 0;
		$pos2 = 0;
		$pos3 = 0;
		if ($find <> "") {
			$temp = substr($temp, 1, $endpos - 1);
			$pos1 = strrpos($temp, $find);
		}
		if ($find2 <> "") {
			$pos2 = strrpos($temp, $find2);
		}
		if ($find3 <> "") {
			$pos3 = strrpos($temp, $find3);
		}
		if ($pos2 > $pos1) {
			$pos = $pos2;
		} else {
			$pos = $pos1;
		}
		if ($pos3 > $pos) {
			$pos = $pos3;
		}
		if ($pos > 0) {
			if (($pos + $minus) < $endpos) {
				$temp = substr($temp, $pos + 1, $endpos - $pos - 1 - $minus);
				$ret = $this->url_to_absolutex($url, $temp, $ret);
			}
		}
		return $ret;
	}

	function findimagetype($type, $html, $url, $ret) {
		$temp = $html;
		$pos = strpos(strtolower($temp), $type);
		while ($pos !== false) {
			$ret = $this->possibleimage($temp, $pos + strlen($type), $url, $ret);		
			$temp = substr($temp, $pos + strlen($type));
			$pos = strpos(strtolower($temp), $type);
		}
		return $ret;
	}

	function precesshtml_raw($html, $url, $ret) {
		$ret = $this->findimagetype(".png", $html, $url, $ret);
		$ret = $this->findimagetype(".jpg", $html, $url, $ret);
		$ret = $this->findimagetype(".jpeg", $html, $url, $ret);
		$ret = $this->findimagetype(".bmp", $html, $url, $ret);
		$ret = $this->findimagetype(".tiff", $html, $url, $ret);
		$ret = $this->findimagetype(".tif", $html, $url, $ret);
		$ret = $this->findimagetype(".gif", $html, $url, $ret);
		return $ret;
	}

	function processhtml($html, $url, $ret) {
		$tokens = explode("<", $html);
		foreach ($tokens as $key=>$token) {
			$temp = trim($token);
			if ((strtoupper(substr($temp, 0, 3)) == "IMG") || (strtoupper(substr($temp, 0, 5)) == "INPUT")) {
				$pos = strpos($temp, ">");
				if ($pos !== false) {
					$temp = substr($temp, 0, $pos);
					$pos2 = strpos(strtoupper($temp), "SRC");

					while ($pos2 !== false) {
						$temp = trim(substr($temp, $pos2+3, $pos));
						if (substr($temp, 0, 1) == "=") {
							$temp = trim(substr($temp, 1, $pos));
							switch (substr($temp, 0, 1)) {
								case "'": 
									$find = "'";
									$temp = substr($temp, 1, $pos);
									break;
								case '"': 
									$find = '"';
									$temp = substr($temp, 1, $pos);
									break;
								default:
									$find = " ";
							}
							$pos3 = strpos($temp, $find);
							if ($pos3 !== false) {
								$temp = substr($temp, 0, $pos3);
								$ret = $this->url_to_absolutex($url, $temp, $ret);
							} else {
								if ($find == " ") {
									$temp = substr($temp, 0, $pos);
									$ret = $this->url_to_absolutex($url, $temp, $ret);
								}
							}
							$pos2 = false;
						} else {
							$pos2 = strpos(strtoupper($temp), "SRC");
						}
					}
				}
			} else {
				//decjuba
				if ((strtoupper(substr($temp, 0, 5)) == "META ")) {
					$pos = strpos($temp, ">");
					if ($pos !== false) {
						$temp = substr($temp, 0, $pos);
						$pos2 = strpos(strtoupper($temp), "PROPERTY");
						if ($pos2 !== false) {
							$temp2 = trim(substr($temp, $pos2+8, $pos));
							if (substr($temp2, 0, 1) == "=") {
								$temp2 = trim(substr($temp2, 1, $pos));
								switch (substr($temp2, 0, 1)) {
									case "'": 
										$find = "'";
										$temp2 = substr($temp2, 1, $pos);
										break;
									case '"': 
										$find = '"';
										$temp2 = substr($temp2, 1, $pos);
										break;
									default:
										$find = " ";
								}							
								$pos3 = strpos($temp2, $find);
								if ($pos3 !== false) {
									$temp2 = substr($temp2, 0, $pos3);
									if (strpos(strtoupper($temp2), "IMAGE") !== false) {
										$pos2 = strpos(strtoupper($temp), "CONTENT");
										if ($pos2 !== false) {
											$temp = trim(substr($temp, $pos2+7, $pos));
											if (substr($temp, 0, 1) == "=") {
												$temp = trim(substr($temp, 1, $pos));
												switch (substr($temp, 0, 1)) {
													case "'": 
														$find = "'";
														$temp = substr($temp, 1, $pos);
														break;
													case '"': 
														$find = '"';
														$temp = substr($temp, 1, $pos);
														break;
													default:
														$find = " ";
												}
												$pos3 = strpos($temp, $find);
												if ($pos3 !== false) {
													$temp = substr($temp, 0, $pos3);
													$ret = $this->url_to_absolutex($url, $temp, $ret);
												} else {
													if ($find == " ") {
														$temp = substr($temp, 0, $pos);
														$ret = $this->url_to_absolutex($url, $temp, $ret);
													}
												}
											}											
										}
									}
								}

							}
						}
					}	
				}
			}
		}

		if( preg_match("#(.+)<\/title>#iU", $html, $t))  {
			$this->htmltitle = preg_replace('/<title>/i', "", trim($t[1]));
//echo "<br>title = " . $this->htmltitle . "<br>";
		}

		$ret = $this->precesshtml_raw($html, $url, $ret);
		return($ret);
	}


	function url_get_contents ($Url) {
    		if (!function_exists('curl_init')){ 
        		die('CURL is not installed!');
    		}
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $Url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    		$output = curl_exec($ch);
    		curl_close($ch);
    		return $output;
	}

	function getimages($url) {

		$url = trim($url);
		if (strpos(strtoupper(trim($url)), "HTTP") === 0) {
			//do nothing
		} else {
			$url = "http://" . $url;
		}

		$html3 = file_get_contents($url);
		if (isset($ret)){
			$ret = $this->processhtml($html3, $url, $ret);
		} else {
			$ret = $this->processhtml($html3, $url, array());
		}

		if (count($ret) < 3) {

    			if (!function_exists('curl_init')){ 
        			die('CURL is not installed!');
    			}
    			$ch = curl_init();

			$thepage = get_web_page($url);
			$html1 = $thepage['content'];
			$ret = processhtml($html1, $url, $ret);
		}

		if (count($ret) < 3) {
			$timeout = 15;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_ENCODING, "");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
			$html2 = curl_exec($ch);
			curl_close($ch);
			$ret = processhtml($html2, $url, $ret);
		}

		if (count($ret) < 3) {
			$html4 = url_get_contents($url);
			$ret = processhtml($html4, $url, $ret);
		}

		if (count($ret) < 3) {
			$html5 = urlload($url);
			$ret = processhtml($html5, $url, $ret);
		}

		//foreach ($ret as $key=>$value) {
		//	$img = explode("\n", $value);
		//	if (($img[1] == 99) && ($img[2] == 99)) {
		//
		//		$thumbnail = imagecreatefromstring(file_get_contents($img[3]));
		//		$width = imagesx($thumbnail);
		//		$height = imagesy($thumbnail);
		//		ImageDestroy($thumbnail);
		//		if (trim($width) != "") {
		//			$value = sprintf('%07d', $height + $width) . "\n" . sprintf('%06d', $height) . "\n" . sprintf('%06d', $width) . "\n" . $img[3]
		//		}
		//	}
		//}

		//rsort($ret);
		return $ret;
	}
}
?>