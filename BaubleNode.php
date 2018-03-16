<?php
/**
 * Simple document node wrapper for my own use to avoid the messy
 * MediaWiki html open-close-whatever thingies.
 */
class BaubleNode {

    private $nodename;
    private $attributes;
    private $innerhtml;
    private $children;

    // Tags that close themselves and contain no children
    public static $selfClosedTags = array(
        "img"
    );

    public function __construct($nodename=null, $attributes=null, $innerhtml=null) {
        $this->nodename = $nodename;
        $this->attributes = $attributes;
        $this->innerhtml = $innerhtml;
        $this->children = null;
    }

    public function append($childnode) {
        if (!$this->children) {
            $this->children = array();
        }
        array_push($this->children, $childnode);
    }

    // Dump the node
    public function dump($indentlvl) {
        $indentlvl = 0; // temporarily, since Tidy removes indent at the moment anyway
        if (!$this->nodename) {
            $outstring = str_repeat("  ", $indentlvl) . $this->innerhtml . "\n";
        } else {
            $outstring = str_repeat("  ", $indentlvl) . "<" . $this->nodename;
            if ($this->attributes) {
                foreach ($this->attributes as $key => $value) {
                    $outstring .= " " . $key . "=\"" . $value . "\"";
                }
            }
            if (in_array($this->nodename, BaubleNode::$selfClosedTags)) {
                $outstring .= " />";
            } else {
                $outstring .= ">";
                if ($this->innerhtml) {
                    $outstring .= $this->innerhtml;
                } else if ($this->children) {
                    $outstring .= "\n";
                    foreach ($this->children as $childnode) {
                        $outstring .= $childnode->dump($indentlvl + 1);
                    }
                    $outstring .= str_repeat("  ", $indentlvl);
                }
                $outstring .= "</" . $this->nodename . ">";
            }
            $outstring .= "\n";
        }
        return $outstring;
    }

}

?>