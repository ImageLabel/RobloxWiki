<?php
class SpecialRobloxWiki extends SpecialPage {
	function __construct() {
		parent::__construct('RobloxLandingPage');
	}



	function execute($par) {
		global $wgOut;
		$request = $this->getRequest();
		$output = $this->getOutput();
		$this->setHeaders();
 
		# Get request data from, e.g.
		$param = $request->getText( 'param' );
 
		# Do stuff
		# ...
		#remove table of contents
		$output->addWikiText("__NOTOC__");

		#setup bootstrap carousel
		$output->addHTML('
		<div id="this-carousel-id" class="carousel slide" >');
		$wikitext = "{{#invoke: Frontpage | generateCarousel | content = {{:FrontpageContent}} }}";
		$output->addWikiText( $wikitext );
		

		#the carousel relies on background-image to display the image to the full width of the screen that resizes with the window. This in turn relies
		#on the CSS function url(). MediaWiki, in all of it's might and wisdom, has decided that url() is the most dangerous thing ever and parses it
		#out of wikitext. We get the url for the background image through a Scribunto module, which of course returns wikitext, so we can't generate the
		#url() call there. In addition, if the full url for the image is in wikitext, <img> tags will be included automatically, which we don't want.
		#The solution we have for now (which is no doubt sub-optimal) is to put a trunkated url into a temporary <p> tag. This then gets parsed by javascript
		#to be put into the url() for the background image. This <p> element is then removed. This process is repeated for billboards.
		$wgOut->addHTML('
  			<!--/div>< Close of carousel inner -->
  <!--  Next and Previous controls below
        href values must reference the id for this carousel -->
    			<a class="carousel-control left carousel-move-button" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
   			<a class="carousel-control right carousel-move-button" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
		</div>	
<script type="text/javascript">
	var temp = document.getElementById("carouselUrls")
	var urlstring = temp.innerHTML;
	var urllist = urlstring.split(";");
	var index;
	for(index = 0; index < urllist.length; index++) {
		var str = "url(\'http:/" + urllist[index] + "\')";
		var idname = "carousel" + index;
		//alert(idname + " " +urllist[index]);
		document.getElementById(idname).style.backgroundImage="linear-gradient(to top, rgba(0, 0, 0, 0.5) 0%, transparent 100%), " + str;
	}
	temp.parentNode.removeChild(temp);
</script>');
	
		
		#Add recent articles
		$output->addHTML('
	<div class="container">
		<div class="article-container">');
	#$output->addWikiText('{{#invoke: Frontpage | generateArticleSection | content = {{:FrontpageContent}} | section = latestSection }}');
	$output->addWikiText('{{#invoke: Frontpage | generateLessonsSection | content = {{:FrontpageContent}} | section= latestSection }}');
	$output->addHTML('
		<div class="article-container-grid-container">');

	$output->addWikiText('{{#invoke: Util | generateContentGrid | {{:FrontpageContent}} | 5 |latestArticles}}');
	$wgOut->addHTML('
		</div>
	</div></div>
	');

		#Add top billboard
		$output->addHTML('
	<!--div id="topBillboard" class="billboard-article" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0,0,0,0) 25%, rgba(0,0,0,0) 100%);">
');
		$output->addWikiText('{{#invoke: Frontpage | generateBillboard | content = {{:FrontpageContent}} | billboard =topBillboard}}');
		#See carousel comments as to why this horrible javascript is neccessary
		$output->addHTML('
	</div>
<script type="text/javascript">
	var temp = document.getElementById("billboard-topBillboard");
	var str = "url(\'http:/" + temp.innerHTML + "\')";
	//document.getElementById("topBillboard").style.backgroundImage= str;
	document.getElementById("topBillboard").style.backgroundImage="linear-gradient(to top, rgba(0, 0, 0, 0.5) 0%, transparent 100%), " + str;
	temp.parentNode.removeChild(temp);
</script-->');

		#Add lessons section
		$output->addHTML('
	<div class="lessons-container">
	<div class="container">
			<div class="lessons-container-row">');
			$output->addWikiText('{{#invoke: Frontpage | generateLessonsSection | content = {{:FrontpageContent}} | section=gettingStarted }}');
			$output->addWikiText('{{#invoke: Util | generateContentGrid | {{:FrontpageContent}} | 2 |gettingStartedArticles}}');
			$output->addHTML('
			</div>
		</div>
		</div>');

			#Add bottom billboard
			$output->addHTML('
		<!--div id="advancedSectionHeader" class="billboard-article">
	');
			$output->addWikiText('{{#invoke: Frontpage | generateBillboard | content = {{:FrontpageContent}} | billboard =bottomBillboard}}');
			#See carousel comments as to why this horrible javascript is neccessary		
			$output->addHTML('
		</div>
	<script type="text/javascript">
		var temp = document.getElementById("billboard-bottomBillboard");
		var str = "url(\'http:/" + temp.innerHTML + "\')";
		document.getElementById("advancedSectionHeader").style.backgroundImage="linear-gradient(to top, rgba(0, 0, 0, 0.5) 0%, transparent 100%), " + str;
		temp.parentNode.removeChild(temp);
	</script-->');
			
			#Add advanced articles
			/*$output->addHTML('
	<div class="container">
		<div style="position:relateive:width:100%;max-width:940px;margin-left:auto;margin-right:auto;padding-top:43px;margin-bottom:43px;">');
			$output->addWikiText('{{#invoke: My_module | generateArticleSection | content = {{:FrontpageContent}} | section = advancedSection }}');

			$output->addHTML('
			<div style="position:relative;width:100%;margin-top:27px;margin-bottom:27px;clear:both;height:328px;">');

			$output->addWikiText('{{#invoke: Util | generateContentGrid | {{:FrontpageContent}} | 5 |advancedArticles}}');
			$wgOut->addHTML('
			</div>
		</div>
	</div>');*/

			#Add RSS feed
			$output->addHTML('
		<div class="container bottom-container">
		<table >
			<tr>
				<td class="col-left" rowspan="3">
					<h3>ROBLOX Blog</h3>
		');
		$output->addWikiText('<rss max=4>http://blog.roblox.com/feed/</rss>');
		$output->addHtml('
				</td>
				<td class="col-right">');
		$output->addWikiText('{{#invoke: Frontpage | generateLessonsSection | content = {{:FrontpageContent}} | section=topCommunity }}');
		$output->addHtml('
				</td>
			</tr>
			<tr>
				<td class="col-right">');
		$output->addWikiText('{{#invoke: Frontpage | generateLessonsSection | content = {{:FrontpageContent}} | section=middleCommunity }}');
		$output->addHtml('
				</td>
			</tr>
			<tr>
				<td class="col-right">');
		$output->addWikiText('{{#invoke: Frontpage | generateLessonsSection | content = {{:FrontpageContent}} | section=bottomCommunity }}');
		$output->addHtml('
				</td>
				<td>
			</tr>
		</table>
	</div>');



		$output->addHTML('
<script type="text/javascript">
	//$(document).ready(function() {
	//var foot = $("#foottest");
	//foot.detach();
	//alert(foot.html());
	//var foot = $("#foottest").detach();
	//foot.css("border", "9px solid red");
	//foot.appendTo("body");
	//alert("test");
	});
</script>
		');

		$output->addHTML('
		</div>
	</div>
');
	}
}
