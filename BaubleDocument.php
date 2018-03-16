<?php
/**
 * Document wrapper thingy to manage the building of the final
 * HTML document to output.
 */
class BaubleDocument {

    private $children;
    private $header;

    public function __construct() {
        $this->children = null;
        $this->header = "<!DOCTYPE html>\n<html>\n<head>\n\t<title>MediaWiki</title>\n</head>\n<body>\n";
    }

    public function set_header($html) {
        $this->header = $html . "\n";
    }

    public function append($childnode) {
        if (!$this->children) {
            $this->children = array();
        }
        array_push($this->children, $childnode);
    }

    public function dump() {
        $output = $this->header;
        if ($this->children) {
            foreach ($this->children as $childnode) {
                $output .= $childnode->dump(1);
            }
        }
        $output .= "</body>\n</html>";
        $tidy = tidy_repair_string($output, array(
            'indent'            => false,
            'indent-spaces'     => 2,
            'output-html'       => true,
            'wrap'              => false,
            'show-body-only'    => false,
            'clean'             => true,
            'input-encoding'    => 'utf8',
            'output-encoding'   => 'utf8',
            'hide-comments'     => true,
            'logical-emphasis'  => true,
            'bare'              => true
        ));
        print($tidy);
    }

}

?>