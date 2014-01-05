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
				<? foreach(explode(",", "Home,Usage,Contact") as $item) { ?>
					<a href="#<?=strtolower($item)?>" data-shortcut="<?=strtolower($item)?>" class="<?=strtolower($item)?> button"><?=$item?></a>
				<? } ?>
			</div>
		</nav>
	</header>
	
	<main>
		<section class="home" id="cover">
			<a name="home"></a>
			<div class="title" id="title">
				<div>
					<div class="card">
						<div>
							<h2>CodeSimulator</h2>
							<p>A Javascript library that creates animated output that looks like code, but isn't really.</p>

							<p>
								It randomly generates code sequences using several base blocks (flow control, variable definition, execution statements, and SQL queries).
								Good for if you ever need output that looks code-y, but is actually nonsense!
							</p>

							<a href="#examples" class="button example" id="example"><i class="fa fa-eye"></i> See it in action</a>
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
$usage = <<<USAGE
<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js"></script>
<script src="CodeSimulator.js"></script>

<script>
// The DOM element we want to output code to
var code = $("code");

var simulator = new CodeSimulator({output: code});
</script>
USAGE;
?>
			<div class="details">

				<div class="func">
					<div>
						<h3>Usage</h3>
						<p>
							Include <a href="//ajax.googleapis.com/ajax/libs/prototype/1.7.1/prototype.js">Prototype.js</a> and <a href="https://raw.github.com/craigymunro/CodeSimulator/master/CodeSimulator.js">CodeSimulator</a>, then do:
						</p>

						<pre><code class="language-javascript"><?=nl2br(htmlentities($usage));?></code></pre>
					</div>
				</div>
				
				<div class="notes">
					<div class="details">
						<h3>Notes &amp; caveats</h3>
						<p>
							There are a few things to know about this library:
						</p>
						
						<ul>
							<li><strong>CodeSimulator</strong> doesn't generate real code.</li>
							<li><strong>CodeSimulator</strong> mixes up syntax from lots of different languages.</li>
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
	
	<script>
		var example = $("example");
		new Event.observe(example, "click", hideCover);
		
		function hideCover(e)
		{
			if(e) e.preventDefault();
			
			var code = $("code");
			var title = $("title");
			
			title.addClassName("hide");
		}

		// Modified from https://gist.github.com/jojohess/1626835		
		function scanline(sel, col, os, dir, lw)
		{
			os = os || 5;
			dir = dir || '0';
			lw = lw || 1;
			
			var g,
				v = document.createElement('canvas'),
				n = v.getContext("2d");
				v.width = os;
				v.height = os;
			
			for(var x = 0; x <= os; x += os)
			{
				n.moveTo(0, x);		
				n.lineTo(os, x);
			}
		
			n.lineWidth = lw;
			n.strokeStyle = col;
			n.stroke();
			
			g = n.canvas.toDataURL();
			
			sel.setStyle(
				{
					backgroundImage: "url(" + g + ")"
				}
			);
		}

	scanline($("code"), "rgba(191,255,0,.1)");
	</script>
</body>
</html>