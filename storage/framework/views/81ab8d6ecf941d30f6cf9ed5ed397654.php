<?php $__env->startSection('content'); ?>
<style> tags -->
    <style>
        :root {
            --electric-purple: #5D3FD3;
            --electric-purple-hover: #4000FF;
            --deep-black: #000000;
            --card-bg: #121212;
            --item-bg: #1a1a1a;
            --border-color: #333333;
            --text-main: #ffffff;
            --text-muted: #f5f5f7;
            --ease-premium: cubic-bezier(0.16, 1, 0.3, 1);
        }

        body {
            background-color: var(--deep-black);
            color: var(--text-main);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
            background-image: radial-gradient(circle at 50% 0%, rgba(93, 63, 211, 0.08) 0%, var(--deep-black) 70%);
            -webkit-font-smoothing: antialiased;
        }

        /* Navbar */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-color);
        }

        /* Sidebar & Layout */
        .dashboard-column {
            background-color: var(--card-bg);
            border: 1px solid rgba(93, 63, 211, 0.25);
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
        }

        .border-purple-top {
            border-top: 4px solid var(--electric-purple) !important;
        }

        /* Buttons */
        .btn-purple {
            background-color: var(--electric-purple);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            transition: all 0.6s var(--ease-premium);
        }
        .btn-purple:hover {
            background-color: var(--electric-purple-hover);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(93, 63, 211, 0.3);
            color: white;
        }

        .btn-outline-secondary {
            color: #cccccc;
            border-color: var(--border-color);
            background-color: var(--item-bg);
            transition: all 0.6s var(--ease-premium);
        }
        .btn-outline-secondary:hover {
            background-color: #2a2a2a;
            color: #ffffff;
            border-color: var(--electric-purple);
        }

        .btn-sidebar-active {
            background-color: rgba(93, 63, 211, 0.15) !important;
            border-color: var(--electric-purple) !important;
            color: var(--electric-purple) !important;
            font-weight: 600;
        }

        .text-purple { color: var(--electric-purple) !important; }

        /* Concept Cards */
        .concept-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.6s var(--ease-premium);
        }
        .concept-card:hover {
            border-color: rgba(93, 63, 211, 0.4);
            box-shadow: 0 10px 40px rgba(93, 63, 211, 0.08);
        }

        /* Code Editor Blocks */
        .code-editor {
            background-color: #0d0d0d;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            padding: 1.25rem;
            overflow-x: auto;
            position: relative;
        }

        .code-editor::before {
            content: '';
            display: block;
            margin-bottom: 1rem;
            background-image: radial-gradient(circle, #ff5f56 6px, transparent 6px),
                              radial-gradient(circle, #ffbd2e 6px, transparent 6px),
                              radial-gradient(circle, #27c93f 6px, transparent 6px);
            background-size: 14px 14px, 14px 14px, 14px 14px;
            background-position: 0 0, 20px 0, 40px 0;
            background-repeat: no-repeat;
            height: 14px;
        }

        .code-editor pre {
            margin: 0;
            color: #e0e0e0;
            font-family: 'SF Mono', 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.82rem;
            line-height: 1.7;
            white-space: pre;
        }

        /* Syntax highlighting classes */
        .kw { color: #c678dd; }          /* keywords: var, let, const, function */
        .fn { color: #61afef; }          /* function names */
        .str { color: #98c379; }         /* strings */
        .cmt { color: #5c6370; font-style: italic; }  /* comments */
        .num { color: #d19a66; }         /* numbers */
        .err { color: #e06c75; }         /* error-related */
        .log { color: #56b6c2; }         /* console.log */

        /* Mock Terminal / Console Output */
        .mock-terminal {
            background-color: #050505;
            border: 1px solid #1a1a1a;
            border-radius: 12px;
            padding: 1.5rem;
            min-height: 220px;
            max-height: 400px;
            overflow-y: auto;
            position: relative;
        }

        .mock-terminal::before {
            content: 'TERMINAL OUTPUT';
            display: block;
            font-size: 0.7rem;
            letter-spacing: 2px;
            color: #444;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #1a1a1a;
        }

        .terminal-line {
            font-family: 'SF Mono', 'Fira Code', 'Courier New', Courier, monospace;
            font-size: 0.85rem;
            line-height: 1.8;
            color: #33ff33; /* Classic green terminal text */
            margin: 0;
            padding: 0;
            opacity: 0;
            transform: translateY(5px);
            animation: terminalFadeIn 0.3s var(--ease-premium) forwards;
        }

        .terminal-line.error {
            color: #ff4d4d;
        }

        .terminal-line.info {
            color: #888;
        }

        .terminal-line.header {
            color: var(--electric-purple);
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .terminal-line.success {
            color: #32d74b;
        }

        @keyframes terminalFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .terminal-cursor {
            display: inline-block;
            width: 8px;
            height: 16px;
            background-color: #33ff33;
            animation: blink 1s step-end infinite;
            vertical-align: text-bottom;
            margin-left: 4px;
        }

        @keyframes blink {
            50% { opacity: 0; }
        }

        .text-muted {
            color: #a0a0a0 !important;
        }
    </style>


    <!-- Minimal Navbar -->
    <nav class="navbar navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" style="color: var(--text-main); letter-spacing: 1px;" href="index.html">
                EDUVANCE <span style="color: var(--electric-purple);">LAB</span>
            </a>
        </div>
    </nav>

    <div class="container py-5 mt-2">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold mb-2 display-6">Code Concept Visualizer</h1>
                <p style="color: var(--text-muted);">Understand JavaScript hoisting and scope through interactive, runnable examples.</p>
            </div>
        </div>

        <!-- Dashboard Grid: col-md-3 sidebar + col-md-9 main -->
        <div class="row g-4">

            <!-- col-md-3 Sidebar -->
            <div class="col-md-3">
                <div class="dashboard-column border-purple-top">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=JS&background=5D3FD3&color=fff&size=100" class="rounded-circle mb-3 shadow" alt="JS" style="border: 3px solid #333;">
                        <h5 class="text-light fw-bold mb-0">JavaScript</h5>
                        <p class="small text-secondary mt-1">ES6+ Concepts</p>
                    </div>

                    <h6 class="text-uppercase text-muted fw-bold mb-3 small border-bottom border-secondary pb-2">Topics</h6>
                    <div class="d-grid gap-2">
                        <a href="lab2.html" class="btn btn-outline-secondary text-start">📊 Dashboard</a>
                        <a href="lab4.html" class="btn btn-outline-secondary text-start">🔒 DOM Manipulation</a>
                        <a href="lab5.html" class="btn btn-outline-secondary text-start">💳 String & Types</a>
                        <button class="btn btn-outline-secondary btn-sidebar-active text-start">⚡ Hoisting & Scope</button>
                    </div>
                </div>
            </div>

            <!-- col-md-9 Main Content -->
            <div class="col-md-9">

                <!-- Two Concept Cards Side by Side -->
                <div class="row g-4 mb-4">

                    <!-- Card 1: Hoisting Demonstration -->
                    <div class="col-md-6">
                        <div class="concept-card h-100 d-flex flex-column">
                            <h5 class="fw-bold text-light mb-1">Hoisting Demonstration</h5>
                            <p class="small text-muted mb-3">See how <code class="text-purple">var</code> and <code class="text-purple">function</code> declarations are hoisted, while <code class="text-purple">let</code>/<code class="text-purple">const</code> enter the Temporal Dead Zone.</p>

                            <div class="code-editor mb-3 flex-grow-1">
<pre><span class="cmt">// 1. Access 'var' BEFORE declaration</span>
<span class="log">console.log</span>(rtxGPU);
<span class="kw">var</span> rtxGPU = <span class="str">"RTX 5090"</span>;

<span class="cmt">// 2. Call function BEFORE declaration</span>
<span class="fn">buildWorkstation</span>();

<span class="kw">function</span> <span class="fn">buildWorkstation</span>() {
  <span class="kw">return</span> <span class="str">"Build complete!"</span>;
}

<span class="cmt">// 3. Access 'let' BEFORE declaration</span>
<span class="kw">try</span> {
  <span class="log">console.log</span>(vrmTemp);
} <span class="kw">catch</span>(e) {
  <span class="log">console.log</span>(e.message);
}
<span class="kw">let</span> vrmTemp = <span class="num">72</span>;</pre>
                            </div>

                            <button id="btnRunHoisting" class="btn btn-purple w-100">▶ Run Hoisting Test</button>
                        </div>
                    </div>

                    <!-- Card 2: Scope Illustration -->
                    <div class="col-md-6">
                        <div class="concept-card h-100 d-flex flex-column">
                            <h5 class="fw-bold text-light mb-1">Scope Illustration</h5>
                            <p class="small text-muted mb-3">Discover how <code class="text-purple">var</code> leaks out of blocks, while <code class="text-purple">let</code> and <code class="text-purple">const</code> remain strictly block-scoped.</p>

                            <div class="code-editor mb-3 flex-grow-1">
<pre><span class="kw">function</span> <span class="fn">testScope</span>() {
  <span class="kw">if</span> (<span class="kw">true</span>) {
    <span class="kw">var</span>   gpuBrand  = <span class="str">"NVIDIA"</span>;
    <span class="kw">let</span>   cpuCores  = <span class="num">24</span>;
    <span class="kw">const</span> ramSize   = <span class="num">64</span>;
  }

  <span class="cmt">// Outside the block:</span>
  <span class="log">console.log</span>(gpuBrand);
  <span class="cmt">// ^ var leaks out ✓</span>

  <span class="kw">try</span> {
    <span class="log">console.log</span>(cpuCores);
  } <span class="kw">catch</span>(e) {
    <span class="log">console.log</span>(e.message);
  }
  <span class="cmt">// ^ let is NOT accessible ✗</span>

  <span class="kw">try</span> {
    <span class="log">console.log</span>(ramSize);
  } <span class="kw">catch</span>(e) {
    <span class="log">console.log</span>(e.message);
  }
  <span class="cmt">// ^ const is NOT accessible ✗</span>
}</pre>
                            </div>

                            <button id="btnRunScope" class="btn btn-purple w-100">▶ Run Scope Test</button>
                        </div>
                    </div>
                </div>

                <!-- Mock Terminal -->
                <div class="concept-card p-0 overflow-hidden">
                    <div class="mock-terminal" id="terminal">
                        <p class="terminal-line info" style="animation-delay: 0s;">Waiting for test execution...</p>
                        <span class="terminal-cursor"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ==========================================
         VANILLA JAVASCRIPT LOGIC
         ========================================== -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const terminal = document.getElementById('terminal');
            const btnHoisting = document.getElementById('btnRunHoisting');
            const btnScope = document.getElementById('btnRunScope');

            // Utility: Clear terminal and prepare for new output
            function clearTerminal() {
                terminal.innerHTML = '';
            }

            // Utility: Print a line to the mock terminal with optional class and delay
            let lineCount = 0;
            function printLine(text, type) {
                const p = document.createElement('p');
                p.className = 'terminal-line' + (type ? ' ' + type : '');
                p.style.animationDelay = (lineCount * 0.08) + 's';
                p.textContent = text;
                
                // Remove existing cursor before appending
                const existingCursor = terminal.querySelector('.terminal-cursor');
                if (existingCursor) existingCursor.remove();

                terminal.appendChild(p);
                
                // Add blinking cursor at the end
                const cursor = document.createElement('span');
                cursor.className = 'terminal-cursor';
                terminal.appendChild(cursor);

                // Auto-scroll to bottom
                terminal.scrollTop = terminal.scrollHeight;
                lineCount++;
            }

            // =========================================================
            // LAB 6 REQUIREMENT: HOISTING DEMONSTRATION
            // =========================================================
            btnHoisting.addEventListener('click', function() {
                clearTerminal();
                lineCount = 0;

                printLine('═══ HOISTING TEST STARTED ═══', 'header');
                printLine('', 'info');

                // --- Test 1: var hoisting ---
                printLine('▸ Test 1: Accessing var BEFORE its declaration', 'info');
                // The actual JS hoisting behavior:
                // 'var' declarations are hoisted to the top, but their value assignment is NOT.
                // So accessing a var before its assignment line yields 'undefined'.
                (function() {
                    // We intentionally access rtxGPU before assignment to demonstrate hoisting
                    /* jshint ignore:start */
                    printLine('  console.log(rtxGPU)  →  ' + String(rtxGPU), 'success');
                    printLine('  Result: "undefined" because var is HOISTED but NOT initialized.', '');
                    var rtxGPU = "RTX 5090";
                    printLine('  After assignment: rtxGPU = "' + rtxGPU + '"', 'success');
                    /* jshint ignore:end */
                })();

                printLine('', 'info');

                // --- Test 2: Function Declaration Hoisting ---
                printLine('▸ Test 2: Calling a function BEFORE its declaration', 'info');
                // Function declarations are fully hoisted (name + body).
                (function() {
                    var result = buildWorkstation();
                    printLine('  buildWorkstation()  →  "' + result + '"', 'success');
                    printLine('  Result: Works perfectly! Function declarations are FULLY hoisted.', '');
                    
                    function buildWorkstation() {
                        return "Build complete!";
                    }
                })();

                printLine('', 'info');

                // --- Test 3: Temporal Dead Zone (let/const) ---
                printLine('▸ Test 3: Accessing let BEFORE declaration (Temporal Dead Zone)', 'info');
                // 'let' and 'const' are hoisted conceptually, but they enter the
                // "Temporal Dead Zone" — accessing them before declaration throws a ReferenceError.
                (function() {
                    try {
                        // We simulate the TDZ error because direct TDZ access
                        // in the same scope would be a parse-time error.
                        // Using eval() to force runtime evaluation:
                        eval('console.log(vrmTemp); let vrmTemp = 72;');
                    } catch(e) {
                        printLine('  console.log(vrmTemp)  →  ERROR', 'error');
                        printLine('  Caught: ' + e.constructor.name + ': ' + e.message, 'error');
                        printLine('  Result: let/const are NOT accessible before declaration!', '');
                    }
                })();

                printLine('', 'info');
                printLine('═══ HOISTING TEST COMPLETE ═══', 'header');
            });

            // =========================================================
            // LAB 6 REQUIREMENT: SCOPE ILLUSTRATION (var vs let/const)
            // =========================================================
            btnScope.addEventListener('click', function() {
                clearTerminal();
                lineCount = 0;

                printLine('═══ SCOPE TEST STARTED ═══', 'header');
                printLine('', 'info');

                // The testScope function replicates the code shown in the card
                function testScope() {
                    if (true) {
                        var   gpuBrand  = "NVIDIA";   // function-scoped (leaks out)
                        // let and const are block-scoped; we must test access outside the block
                    }

                    // --- var leaks outside the if-block ---
                    printLine('▸ Test 1: var gpuBrand OUTSIDE the if-block', 'info');
                    printLine('  console.log(gpuBrand)  →  "' + gpuBrand + '"', 'success');
                    printLine('  Result: var LEAKS out of block scope — it is function-scoped.', '');

                    printLine('', 'info');

                    // --- let is block-scoped ---
                    printLine('▸ Test 2: let cpuCores OUTSIDE the if-block', 'info');
                    try {
                        // Using eval to create a real block-scoped let inside an if,
                        // then attempt access outside.
                        eval('if(true){ let cpuCores = 24; } console.log(cpuCores);');
                    } catch(e) {
                        printLine('  console.log(cpuCores)  →  ERROR', 'error');
                        printLine('  Caught: ' + e.constructor.name + ': ' + e.message, 'error');
                        printLine('  Result: let is BLOCK-SCOPED — cannot access outside if{}.', '');
                    }

                    printLine('', 'info');

                    // --- const is block-scoped ---
                    printLine('▸ Test 3: const ramSize OUTSIDE the if-block', 'info');
                    try {
                        eval('if(true){ const ramSize = 64; } console.log(ramSize);');
                    } catch(e) {
                        printLine('  console.log(ramSize)  →  ERROR', 'error');
                        printLine('  Caught: ' + e.constructor.name + ': ' + e.message, 'error');
                        printLine('  Result: const is BLOCK-SCOPED — cannot access outside if{}.', '');
                    }
                }

                testScope();

                printLine('', 'info');
                printLine('═══ SCOPE TEST COMPLETE ═══', 'header');
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\sem 4\FSDL NEW\eduvance-portal\resources\views/labs/lab6.blade.php ENDPATH**/ ?>