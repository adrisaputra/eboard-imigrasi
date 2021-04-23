<?php
require('fpdf.php');

class PDF_MC_Table extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row2($data, $border=array(), $align=array(), $style=array(), $maxline=array())
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++){
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	}
	if (count($maxline)) {
			$_maxline = max($maxline);
			if ($nb > $_maxline) {
				$nb = $_maxline;
			}
		}
    $h=8*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
		// alignment
		$a = isset($align[$i]) ? $align[$i] : 'L';
		// maxline
		$m = isset($maxline[$i]) ? $maxline[$i] : false;
		
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        //$this->Rect($x,$y,$w,$h);
		//Draw the border
			if ($border[$i]==1) {
				$this->Rect($x,$y,$w,$h);
			} else {
				$_border = strtoupper($border[$i]);
				if (strstr($_border, 'L')!==false) {
					$this->Line($x, $y, $x, $y+$h);
				}
				if (strstr($_border, 'R')!==false) {
					$this->Line($x+$w, $y, $x+$w, $y+$h);
				}
				if (strstr($_border, 'T')!==false) {
					$this->Line($x, $y, $x+$w, $y);
				}
				if (strstr($_border, 'B')!==false) {
					$this->Line($x, $y+$h, $x+$w, $y+$h);
				}
			}
		// Setting Style
		if (isset($style[$i])) {
			$this->SetFont('', $style[$i]);
		}
		
		if(substr($data[$i],-3) == 'jpg' || substr($data[$i],-3) == 'png')
		{
		  $ih = $h - 0.5;
		  $iw = $w - 0.5;
		  $ix = $x + 0.25;
		  $iy = $y + 0.25;
		  //show image
		  $this->MultiCell($w,8,$this->Image ($data[$i],$ix,$iy,$iw),0,$a);
		}else
		{
		  //Print the text
		  $this->MultiCell($w,8,$data[$i],0,$a);
		}
		
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function Row($data, $border=array(), $align=array(), $style=array(), $maxline=array())
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++){
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	}
	if (count($maxline)) {
			$_maxline = max($maxline);
			if ($nb > $_maxline) {
				$nb = $_maxline;
			}
		}
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
		// alignment
		$a = isset($align[$i]) ? $align[$i] : 'L';
		// maxline
		$m = isset($maxline[$i]) ? $maxline[$i] : false;
		
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        //$this->Rect($x,$y,$w,$h);
		//Draw the border
			if ($border[$i]==1) {
				$this->Rect($x,$y,$w,$h);
			} else {
				$_border = strtoupper($border[$i]);
				if (strstr($_border, 'L')!==false) {
					$this->Line($x, $y, $x, $y+$h);
				}
				if (strstr($_border, 'R')!==false) {
					$this->Line($x+$w, $y, $x+$w, $y+$h);
				}
				if (strstr($_border, 'T')!==false) {
					$this->Line($x, $y, $x+$w, $y);
				}
				if (strstr($_border, 'B')!==false) {
					$this->Line($x, $y+$h, $x+$w, $y+$h);
				}
			}
		// Setting Style
		if (isset($style[$i])) {
			$this->SetFont('', $style[$i]);
		}
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

//Cell with horizontal scaling if text is too wide
	function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
	{
		//Get string width
		$str_width=$this->GetStringWidth($txt);

		//Calculate ratio to fit cell
		if($w==0)
			$w = $this->w-$this->rMargin-$this->x;
		$ratio = ($w-$this->cMargin*2)/$str_width;

		$fit = ($ratio < 1 || ($ratio > 1 && $force));
		if ($fit)
		{
			if ($scale)
			{
				//Calculate horizontal scaling
				$horiz_scale=$ratio*100.0;
				//Set horizontal scaling
				$this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
			}
			else
			{
				//Calculate character spacing in points
				$char_space=($w-$this->cMargin*2-$str_width)/max(strlen($txt)-1,1)*$this->k;
				//Set character spacing
				$this->_out(sprintf('BT %.2F Tc ET',$char_space));
			}
			//Override user alignment (since text will fill up cell)
			$align='';
		}

		//Pass on to Cell method
		$this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

		//Reset character spacing/horizontal scaling
		if ($fit)
			$this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
	}

	//Cell with horizontal scaling only if necessary
	function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		$this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
	}

	//Cell with horizontal scaling always
	function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		$this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
	}

	//Cell with character spacing only if necessary
	function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		$this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
	}

	//Cell with character spacing always
	function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	{
		//Same as calling CellFit directly
		$this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
	}
}
?>