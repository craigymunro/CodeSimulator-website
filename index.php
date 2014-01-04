<html>
<head>
	<title>CodeSimulator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="stylesheet/less" type="text/css" href="less/base.less" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>
	<link href="prism.css" rel="stylesheet" />	
	<script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js"></script>
	<script src="lib/CodeSimulator/CodeSimulator.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.5.0/less.min.js	" type="text/javascript"></script>

	<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
	<script>
	  WebFont.load({
	    google: {
	      families: ['Crimson Text']
	    }
	  });
	</script>
</head>
<body>
	<header>
		<h1>CodeSimulator</h1>		
		<nav>
			<div>
				<? foreach(explode(",", "Home,Example,Usage,Contact") as $item) { ?>
					<a href="#<?=strtolower($item)?>" data-shortcut="<?=strtolower($item)?>" class="<?=strtolower($item)?> button"><?=$item?></a>
				<? } ?>
			</div>
		</nav>
	</header>
	
	<main>
		<section class="home" id="cover">
			<a name="home"></a>
			<div class="title">
				<div>
					<div class="card">
						<div>
							<h2>CodeSimulator</h2>
							<p>A Javascript library that creates animated output that looks like code, but isn't really.</p>

							<p>
								It randomly generates code sequences using several base blocks (flow control, variable definition, execution statements, and SQL queries).
								Good for creating nonsense output to show to someone code illiterate!
							</p>

							<a href="#examples" class="button examples"><i class="fa fa-eye"></i> See it in action</a>
							<a href="https://raw.github.com/craigymunro/CodeSimulator/master/CodeSimulator.js" class="button download"><i class="fa fa-download"></i> Download CodeSimulator.js</a>
							<a href="https://github.com/craigymunro/CodeSimulator" class="button"><i class="fa fa-github"></i> View on Github</a>
						</div>
					</div>
				</div>
			</div>
			<code id="code"></code>
		</section>
			
		<section class="usage">
			<a name="usage"></a>
<?
$base = <<<BASE
<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js"></script>
<script src="CodeSimulator.js"></script>

<script>
// The image we'll be finding the palette for
var image = $("demo");

// Create a new instance of CodeSimulator
var finder = new CodeSimulator();


BASE;

$end = <<<END

</script>
END;

$dom = <<<DOM
// Find the dominant colour in the image. Returns a single hex code, i.e: "0069ff".
var dominant = finder.getDominant(image);
DOM;

$ave = <<<AVE
// Find the average colour of the image. Returns a single hex code, i.e. "00fa30".
var average = finder.getAverage(image);
AVE;

$pal = <<<PAL
// Find the colour palette of the image. Returns an array of
// hex codes. Returns 10 colours by default.
// ["0069ff", "0069aa", "20ba20", etc]
var palette = finder.getPalette(image, size);
PAL;
?>			
			<div class="details">
				<h2>Usage</h2>
				<p>
					Include <a href="//ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js">Prototype.js</a> and <a href="https://raw.github.com/craigymunro/CodeSimulator/master/CodeSimulator.js">CodeSimulator</a>, then use one (or all) of these functions:
				</p>
				
				<div class="func">
					<div>
						<h3>Get the dominant colour in an image</h3>
						<pre><code class="language-javascript"><?=nl2br(htmlentities($base . $dom . $end));?></code></pre>
					</div>
				</div>

				<div class="func">
					<div>
						<h3>Get the average colour of an image</h3>
						<pre><code class="language-javascript"><?=nl2br(htmlentities($base . $ave . $end));?></code></pre>
					</div>
				</div>

				<div class="func">
					<div>
						<h3>Get the colour palette of an image</h3>
						<pre><code class="language-javascript"><?=nl2br(htmlentities($base . $pal . $end));?></code></pre>
					</div>
				</div>
				
				<div class="notes">
					<div class="details">
						<h3>Notes &amp; caveats</h3>
						<p>
							There are a few things to know about this library:
						</p>
						
						<ul>
							<li><strong>CodeSimulator</strong> internally downsamples images to 1024 pixels wide to reduce processing time.</li>
							<li><strong>CodeSimulator</strong> is biased towards saturated colours. It gives them a slightly higher weighting, as they are perceived to be more dominant than washed out colours.</li>
						</ul>
						
						<p class="cta">
							<a href="https://raw.github.com/craigymunro/CodeSimulator/master/CodeSimulator.js" class="button download"><i class="fa fa-download"></i> Download CodeSimulator.js</a>
							<a href="https://github.com/craigymunro/CodeSimulator" class="button"><i class="fa fa-github"></i> View on Github</a>
						</p>

					</div>
				</div>
			</div>
		</section>
		
		<section class="contact">
			<a name="contact"></a>
			<div class="details">
				<h2>Contact</h2>
				<p>
					Found a bug? Got a question? Or just want to say hello? Find me on Twitter as <a href="http://www.twitter.com/craigmunro" class="button inline">@craigmunro</a>.
				</p>
			</div>
		</section>
	</main>
	
	<script>
		new CodeSimulator({output: $("code")});
	</script>
	<script src="prism.js"></script>
</body>
</html>