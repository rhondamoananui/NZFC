<?php
$data = array(
               3  => 'Rhonda',
               7  => 'Rhonda',
               13 => 'Rhonda',
               26 => 'Rhonda'
             );
                        
echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $data);
                
?>
