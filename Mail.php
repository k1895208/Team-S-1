<?php require_once "smtp.php"; ?>
<?php


//

// +----------------------------------------------------------------------+

// | PHP Version 4                                                        |

// +----------------------------------------------------------------------+                      

// +----------------------------------------------------------------------+

// | This source file is subject to version 2.02 of the PHP license,      |

// | that is bundled with this package in the file LICENSE, and is        |

// | available at through the world-wide-web at                           |

// | http://www.php.net/license/2_02.txt.                                 |

// | If you did not receive a copy of the PHP license and are unable to   |

// | obtain it through the world-wide-web, please send a note to          |

// | license@php.net so we can mail you a copy immediately.               |

// +----------------------------------------------------------------------+

// | Author: Chuck Hagenbuch <chuck@horde.org>                            |

// +----------------------------------------------------------------------+

//

// $Id: Mail.php,v 1.6 2003/06/26 07:05:36 jon Exp $

 

 require_once 'PEAR.php';

 

/**

 * PEAR's Mail:: interface. Defines the interface for implementing

 * mailers under the PEAR hierarchy, and provides supporting functions

 * useful in multiple mailer backends.

 *

 * @access public

 * @version $Revision: 1.6 $

 * @package Mail

 */

class Mail

{

    /**

     * Line terminator used for separating header lines.

     * @var string 

     */

    var $sep = "\r\n";

 

    /**

     * Provides an interface for generating Mail:: objects of various

     * types

     *

     * @param string $driver The kind of Mail:: object to instantiate.

     * @param array  $params The parameters to pass to the Mail:: object.

     * @return object Mail a instance of the driver class or if fails a PEAR Error

     * @access public

     */

    function factory($driver, $params = array())

    {
        // include_once '/smtp.php';
        echo($driver);

        $driver = strtolower($driver);

       
        
        $class = 'Net_SMTP';
   
        echo($class);
        if (class_exists($class)) {
            // $smtp = new Net_SMTP('ssl://mail.host.com', 465);
            $smtp = new Net_SMTP($params);
            // $smtp->connect();
            // return new $class($params);
      return $smtp;
        } else {

            return PEAR::raiseError('Unable to find class for driver ' . $driver);

        }

    }

 

    /**

     * Implements Mail::send() function using php's built-in mail()

     * command.

     *

     * @param mixed $recipients Either a comma-seperated list of recipients

     *               (RFC822 compliant), or an array of recipients,

     *               each RFC822 valid. This may contain recipients not

     *               specified in the headers, for Bcc:, resending

     *               messages, etc.

     *

     * @param array $headers The array of headers to send with the mail, in an

     *               associative array, where the array key is the

     *               header name (ie, 'Subject'), and the array value

     *               is the header value (ie, 'test'). The header

     *               produced from those values would be 'Subject:

     *               test'.

     *

     * @param string $body The full text of the message body, including any

     *                Mime parts, etc.

     *

     * @return mixed Returns true on success, or a PEAR_Error

     *                containing a descriptive error message on

     *                failure.

     * @access public

     * @deprecated use Mail_mail::send instead

     */

    public function send($recipients, $headers, $body)

    {
     echo('reaches send function');
        // if we're passed an array of recipients, implode it.

        if (is_array($recipients)) {
          echo('if function is true');
            $recipients = implode(', ', $recipients);

        }

 

        // get the Subject out of the headers array so that we can

        // pass it as a seperate argument to mail().

        $subject = '';

        if (isset($headers['Subject'])) {
            echo('if the header is subject ');

            $subject = $headers['Subject'];

            unset($headers['Subject']);

        }

 

        // flatten the headers out.
    echo('out of if ');

        list(,$text_headers) = Mail::prepareHeaders($headers);
  
        echo('send function works');

        return mail($recipients, $subject, $body, $text_headers);

 

    }

 

    /**

     * Take an array of mail headers and return a string containing

     * text usable in sending a message.

     *

     * @param array $headers The array of headers to prepare, in an associative

     *               array, where the array key is the header name (ie,

     *               'Subject'), and the array value is the header

     *               value (ie, 'test'). The header produced from those

     *               values would be 'Subject: test'.

     *

     * @return mixed Returns false if it encounters a bad address,

     *                otherwise returns an array containing two

     *                elements: Any From: address found in the headers,

     *                and the plain text version of the headers.

     * @access private

     */

    function prepareHeaders($headers)

    {

        $lines = array();

        $from = null;

 

        foreach ($headers as $key => $value) {

            if ($key === 'From') {

                include_once 'Mail/RFC822.php';
        
                $Mail_RFC822 = new Mail_RFC822();

                $addresses = Mail_RFC822::parseAddressList($value, 'localhost',

                                                           false);

                $from = $addresses[0]->mailbox . '@' . $addresses[0]->host;

 

                // Reject envelope From: addresses with spaces.

                if (strstr($from, ' ')) {

                    return false;

                }

 

                $lines[] = $key . ': ' . $value;

            } elseif ($key === 'Received') {

                // Put Received: headers at the top.  Spam detectors often

                // flag messages with Received: headers after the Subject:

                // as spam.

                array_unshift($lines, $key . ': ' . $value);

            } else {

                $lines[] = $key . ': ' . $value;

            }

        }

 

        return array($from, join($this->sep, $lines) . $this->sep);

    }

 

    /**

     * Take a set of recipients and parse them, returning an array of

     * bare addresses (forward paths) that can be passed to sendmail

     * or an smtp server with the rcpt to: command.

     *

     * @param mixed Either a comma-seperated list of recipients

     *               (RFC822 compliant), or an array of recipients,

     *               each RFC822 valid.

     *

     * @return array An array of forward paths (bare addresses).

     * @access private

     */

    function parseRecipients($recipients)

    {

        include_once 'Mail/RFC822.php';

 

        // if we're passed an array, assume addresses are valid and

        // implode them before parsing.

        if (is_array($recipients)) {

            $recipients = implode(', ', $recipients);

        }

 

        // Parse recipients, leaving out all personal info. This is

        // for smtp recipients, etc. All relevant personal information

        // should already be in the headers.

        $addresses = Mail_RFC822::parseAddressList($recipients, 'localhost', false);

        $recipients = array();

        if (is_array($addresses)) {

            foreach ($addresses as $ob) {

                $recipients[] = $ob->mailbox . '@' . $ob->host;

            }

        }

 

        return $recipients;

    }

 

}

?>
