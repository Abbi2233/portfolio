/**
 * Abid Hussain Khan — Portfolio  |  script.js v3.0
 * ─────────────────────────────────────────────────
 * Features:
 *   • Custom lerp cursor with magnetic field
 *   • WebGL-free particle canvas (optimised RAF loop)
 *   • Syntax-highlighted typewriter code terminal
 *   • Scroll-triggered animated skill bars
 *   • Infinite tech marquee
 *   • 3-D card tilt (vanilla, no deps)
 *   • Magnetic CTA buttons
 *   • Staggered IntersectionObserver reveals
 *   • Typed-text hero effect
 *   • Animated stat counters (easeOutQuart)
 *   • Scroll-spy active nav links
 *   • Accessible mobile hamburger menu
 */

'use strict';

/* ── Utility helpers ──────────────────────────────────────── */
const qs  = (s, ctx = document) => ctx.querySelector(s);
const qsa = (s, ctx = document) => [...ctx.querySelectorAll(s)];
const $ = qs;

/* ── DOM Ready ────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    initCursor();
    initNavbar();
    initScrollProgress();
    initScrollSpy();
    initHamburger();
    initRevealAnimations();
    initTypingEffect();
    initCounterAnimation();
    initParticleCanvas();
    initProjectFilters();
    initCardTilt();
    initMagneticButtons();
    initSmoothScroll();
    initCodeTerminal();
    initSkillBars();
});

/* ──────────────────────────────────────────────────────────
   1. CUSTOM CURSOR
────────────────────────────────────────────────────────── */
function initCursor() {
    const dot  = $('#cursorDot');
    const ring = $('#cursorRing');
    if (!dot || !ring) return;

    // Only on real pointer devices
    if (!window.matchMedia('(hover: hover)').matches) return;

    let mx = 0, my = 0, rx = 0, ry = 0;
    let raf;

    document.addEventListener('mousemove', e => {
        mx = e.clientX;
        my = e.clientY;
        dot.style.left = `${mx}px`;
        dot.style.top  = `${my}px`;
    }, { passive: true });

    // Ring follows with smooth lerp
    function lerp(a, b, t) { return a + (b - a) * t; }
    function loop() {
        rx = lerp(rx, mx, 0.12);
        ry = lerp(ry, my, 0.12);
        ring.style.left = `${rx}px`;
        ring.style.top  = `${ry}px`;
        raf = requestAnimationFrame(loop);
    }
    loop();

    // Expand on interactive elements
    const hovTargets = 'a, button, .project-card, .spec-card, .skill-domain, .filter-btn, .contact-link';
    document.addEventListener('mouseover', e => {
        if (e.target.closest(hovTargets)) ring.classList.add('hovered');
    });
    document.addEventListener('mouseout', e => {
        if (e.target.closest(hovTargets)) ring.classList.remove('hovered');
    });

    document.addEventListener('mouseleave', () => {
        dot.style.opacity  = '0';
        ring.style.opacity = '0';
    });
    document.addEventListener('mouseenter', () => {
        dot.style.opacity  = '1';
        ring.style.opacity = '1';
    });
}

/* ──────────────────────────────────────────────────────────
   2. NAVBAR — Scroll State
────────────────────────────────────────────────────────── */
function initNavbar() {
    const nav = $('#navbar');
    if (!nav) return;

    let ticking = false;
    const update = () => {
        nav.classList.toggle('scrolled', window.scrollY > 30);
        ticking = false;
    };
    window.addEventListener('scroll', () => {
        if (!ticking) { requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
}

/* ──────────────────────────────────────────────────────────
   3. SCROLL PROGRESS BAR
────────────────────────────────────────────────────────── */
function initScrollProgress() {
    const bar = $('#scrollProgress');
    if (!bar) return;

    const update = () => {
        const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
        const pct = scrollTotal > 0 ? (window.scrollY / scrollTotal) * 100 : 0;
        bar.style.width = `${pct}%`;
    };
    window.addEventListener('scroll', update, { passive: true });
    update();
}

/* ──────────────────────────────────────────────────────────
   4. SCROLL SPY — Active nav link
────────────────────────────────────────────────────────── */
function initScrollSpy() {
    const sections  = qsa('section[id], header[id]');
    const navItems  = qsa('.nav-links li');
    const navLinks  = qsa('.nav-links a[data-section]');

    const io = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const id = entry.target.id;
            navItems.forEach(li => li.classList.remove('active'));
            const link = navLinks.find(a => a.dataset.section === id);
            if (link) link.closest('li').classList.add('active');
        });
    }, { threshold: 0.4, rootMargin: '-15% 0px -40% 0px' });

    sections.forEach(s => io.observe(s));
}

/* ──────────────────────────────────────────────────────────
   5. HAMBURGER / MOBILE MENU
────────────────────────────────────────────────────────── */
function initHamburger() {
    const btn  = $('#hamburger');
    const menu = $('#navLinks');
    if (!btn || !menu) return;

    const toggle = () => {
        const open = menu.classList.toggle('open');
        btn.classList.toggle('active', open);
        btn.setAttribute('aria-expanded', String(open));
        document.body.style.overflow = open ? 'hidden' : '';
    };

    btn.addEventListener('click', toggle);

    // Close on link click
    qsa('.nav-links a').forEach(a => {
        a.addEventListener('click', () => {
            menu.classList.remove('open');
            btn.classList.remove('active');
            btn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    });

    // Close on backdrop click
    document.addEventListener('click', e => {
        if (menu.classList.contains('open') && !e.target.closest('.nav-inner')) {
            toggle();
        }
    });
}

/* ──────────────────────────────────────────────────────────
   6. REVEAL ANIMATIONS — IntersectionObserver
────────────────────────────────────────────────────────── */
function initRevealAnimations() {
    const els = qsa('.reveal-up, .reveal-left, .reveal-right');
    if (!els.length) return;

    const io = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('visible');
            obs.unobserve(entry.target);
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    els.forEach((el, i) => {
        // Stagger siblings automatically
        if (!el.classList.contains('delay-0') && !el.style.transitionDelay) {
            const sibs = [...(el.parentElement?.children || [])].filter(
                c => c.classList.contains('reveal-up') || c.classList.contains('reveal-left') || c.classList.contains('reveal-right')
            );
            const idx = sibs.indexOf(el);
            el.style.transitionDelay = `${idx * 80}ms`;
        }
        io.observe(el);
    });
}

/* ──────────────────────────────────────────────────────────
   7. TYPING EFFECT
────────────────────────────────────────────────────────── */
function initTypingEffect() {
    const el = $('#typedText');
    if (!el) return;

    const phrases = [
        'Information Security Officer',
        'Software Developer (Python & .NET)',
        'ICT Administrator',
        'InfoSec Specialist',
        'Expert Systems Engineer',
    ];

    let pi = 0, ci = 0, deleting = false, pauseTimer = null;
    const SPEED_TYPE   = 60;
    const SPEED_DEL    = 35;
    const PAUSE_AFTER  = 1800;
    const PAUSE_BEFORE = 300;

    function tick() {
        const phrase = phrases[pi];
        if (deleting) {
            ci--;
            el.textContent = phrase.slice(0, ci);
            if (ci === 0) {
                deleting = false;
                pi = (pi + 1) % phrases.length;
                pauseTimer = setTimeout(tick, PAUSE_BEFORE);
                return;
            }
            pauseTimer = setTimeout(tick, SPEED_DEL);
        } else {
            ci++;
            el.textContent = phrase.slice(0, ci);
            if (ci === phrase.length) {
                deleting = true;
                pauseTimer = setTimeout(tick, PAUSE_AFTER);
                return;
            }
            pauseTimer = setTimeout(tick, SPEED_TYPE);
        }
    }
    tick();
}

/* ──────────────────────────────────────────────────────────
   8. COUNTER ANIMATION
────────────────────────────────────────────────────────── */
function initCounterAnimation() {
    const statsSection = $('#heroStats');
    if (!statsSection) return;

    let animated = false;

    function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }

    function animateCounter(el) {
        const target = parseInt(el.dataset.count, 10);
        const duration = 1600;
        const start = performance.now();

        const step = (now) => {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            el.textContent = Math.round(easeOutQuart(progress) * target);
            if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    }

    const io = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting && !animated) {
            animated = true;
            qsa('.stat-num[data-count]').forEach(animateCounter);
            io.disconnect();
        }
    }, { threshold: 0.5 });

    io.observe(statsSection);
}

/* ──────────────────────────────────────────────────────────
   9. PARTICLE CANVAS
────────────────────────────────────────────────────────── */
function initParticleCanvas() {
    const canvas = $('#particleCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    // Reduce particle count on mobile / low-end devices
    const isMobile = window.innerWidth < 768;
    const PARTICLE_COUNT = isMobile ? 40 : 80;

    let W, H, particles = [], raf;

    const resize = () => {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    };

    class Particle {
        constructor() { this.reset(true); }
        reset(init = false) {
            this.x  = Math.random() * W;
            this.y  = init ? Math.random() * H : H + 10;
            this.r  = Math.random() * 1.5 + 0.4;
            this.vx = (Math.random() - 0.5) * 0.25;
            this.vy = -(Math.random() * 0.35 + 0.1);
            this.alpha = Math.random() * 0.5 + 0.1;
            this.life  = 0;
            this.maxLife = Math.random() * 300 + 200;
            // Occasionally violet, mostly cyan
            this.hue = Math.random() > 0.75 ? 265 : 192;
        }
        update() {
            this.x    += this.vx;
            this.y    += this.vy;
            this.life++;
            // Fade in then out
            const t = this.life / this.maxLife;
            this.alpha = t < 0.1 ? t / 0.1 * 0.5
                        : t > 0.8 ? (1 - t) / 0.2 * 0.5
                        : 0.5;
            if (this.life > this.maxLife || this.y < -10) this.reset();
        }
        draw() {
            ctx.save();
            ctx.globalAlpha = this.alpha;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
            ctx.fillStyle = `hsl(${this.hue}, 100%, 70%)`;
            ctx.fill();
            ctx.restore();
        }
    }

    // Draw connecting lines between nearby particles
    function drawConnections() {
        const maxDist = 110;
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const d  = Math.sqrt(dx * dx + dy * dy);
                if (d < maxDist) {
                    ctx.save();
                    ctx.globalAlpha = (1 - d / maxDist) * 0.08;
                    ctx.strokeStyle = '#00d4ff';
                    ctx.lineWidth   = 0.8;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                    ctx.restore();
                }
            }
        }
    }

    function init() {
        resize();
        particles = Array.from({ length: PARTICLE_COUNT }, () => new Particle());
    }

    function loop() {
        ctx.clearRect(0, 0, W, H);
        particles.forEach(p => { p.update(); p.draw(); });
        drawConnections();
        raf = requestAnimationFrame(loop);
    }

    // Pause when tab hidden
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) cancelAnimationFrame(raf);
        else loop();
    });

    // Debounced resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => { resize(); }, 200);
    }, { passive: true });

    init();
    loop();
}

/* ──────────────────────────────────────────────────────────
   10. PROJECT FILTERS
────────────────────────────────────────────────────────── */
function initProjectFilters() {
    const btns  = qsa('.filter-btn');
    const cards = qsa('.project-card');
    if (!btns.length) return;

    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Active state
            btns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;

            cards.forEach(card => {
                const cats = (card.dataset.cat || '').split(' ');
                const show = filter === 'all' || cats.includes(filter);

                if (show) {
                    card.classList.remove('hidden');
                    // Stagger re-entry
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    requestAnimationFrame(() => {
                        card.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    });
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
}

/* ──────────────────────────────────────────────────────────
   11. 3D CARD TILT
────────────────────────────────────────────────────────── */
function initCardTilt() {
    // Skip on touch devices
    if (!window.matchMedia('(hover: hover)').matches) return;

    qsa('[data-tilt]').forEach(card => {
        const MAX = 8; // degrees

        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width  - 0.5;
            const y = (e.clientY - rect.top)  / rect.height - 0.5;
            card.style.transform = `
                perspective(900px)
                rotateY(${x * MAX}deg)
                rotateX(${-y * MAX}deg)
                translateY(-6px)
            `;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.transition = 'transform 0.4s ease';
        });

        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.05s ease';
        });
    });
}

/* ──────────────────────────────────────────────────────────
   12. MAGNETIC BUTTONS
────────────────────────────────────────────────────────── */
function initMagneticButtons() {
    if (!window.matchMedia('(hover: hover)').matches) return;

    qsa('.mag-btn').forEach(btn => {
        const STRENGTH = 0.3;

        btn.addEventListener('mousemove', e => {
            const rect = btn.getBoundingClientRect();
            const cx = rect.left + rect.width  / 2;
            const cy = rect.top  + rect.height / 2;
            const dx = (e.clientX - cx) * STRENGTH;
            const dy = (e.clientY - cy) * STRENGTH;
            btn.style.transform = `translate(${dx}px, ${dy}px)`;
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
            btn.style.transition = 'transform 0.4s cubic-bezier(0.34,1.56,0.64,1)';
        });

        btn.addEventListener('mouseenter', () => {
            btn.style.transition = 'transform 0.15s ease';
        });
    });
}

/* ──────────────────────────────────────────────────────────
   13. SMOOTH SCROLL (with navbar offset)
────────────────────────────────────────────────────────── */
function initSmoothScroll() {
    const nav = $('#navbar');

    qsa('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const href = link.getAttribute('href');
            if (href === '#') return;
            const target = $(href);
            if (!target) return;

            e.preventDefault();
            const navH = nav ? nav.offsetHeight : 72;
            const top  = target.getBoundingClientRect().top + window.scrollY - navH - 16;

            window.scrollTo({ top, behavior: 'smooth' });
        });
    });
}

/* ──────────────────────────────────────────────────────────
   14. CODE TERMINAL — Syntax-highlighted typewriter
────────────────────────────────────────────────────────── */
function initCodeTerminal() {
    const terminal = qs('#terminalCode code');
    if (!terminal) return;

    // TypeScript-style code snippet showcasing skills
    const lines = [
        { raw: `<span class="cm">// Abid Hussain Khan — Developer & InfoSec Profile</span>` },
        { raw: `` },
        { raw: `<span class="kw">interface</span> <span class="ty">Professional</span> <span class="pu">{</span>` },
        { raw: `  name<span class="pu">:</span>      <span class="ty">string</span><span class="pu">;</span>` },
        { raw: `  roles<span class="pu">:</span>     <span class="ty">string</span><span class="pu">[];</span>` },
        { raw: `  focus<span class="pu">:</span>     <span class="ty">string</span><span class="pu">[];</span>` },
        { raw: `  active<span class="pu">:</span>    <span class="ty">boolean</span><span class="pu">;</span>` },
        { raw: `<span class="pu">}</span>` },
        { raw: `` },
        { raw: `<span class="kw">const</span> <span class="nm">abid</span><span class="pu">:</span> <span class="ty">Professional</span> <span class="pu">=</span> <span class="pu">{</span>` },
        { raw: `  name<span class="pu">:</span>      <span class="st">"Abid Hussain Khan"</span><span class="pu">,</span>` },
        { raw: `  roles<span class="pu">:</span>     <span class="pu">[</span><span class="st">"InfoSec Officer"</span><span class="pu">,</span> <span class="st">"ICT Administrator"</span><span class="pu">,</span> <span class="st">"Software Dev"</span><span class="pu">],</span>` },
        { raw: `  focus<span class="pu">:</span>     <span class="pu">[</span><span class="st">"Python"</span><span class="pu">,</span> <span class="st">".NET C#"</span><span class="pu">,</span> <span class="st">"Network Security"</span><span class="pu">],</span>` },
        { raw: `  active<span class="pu">:</span>    <span class="kw">true</span><span class="pu">,</span>` },
        { raw: `<span class="pu">};</span>` },
        { raw: `` },
        { raw: `<span class="fn">console</span><span class="pu">.</span><span class="fn">log</span><span class="pu">(</span><span class="st">"Security-First Engineering"</span><span class="pu">);</span>` },
    ];

    let li = 0;
    let inView = false;

    const io = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting && !inView) {
            inView = true;
            typeLine();
            io.disconnect();
        }
    }, { threshold: 0.3 });

    io.observe(qs('#about') || terminal);

    function typeLine() {
        if (li >= lines.length) return;
        const html = lines[li].raw;
        terminal.innerHTML += html + '\n';
        li++;
        const delay = html.trim() === '' ? 80 : 55 + Math.random() * 30;
        setTimeout(typeLine, delay);
    }
}

/* ──────────────────────────────────────────────────────────
   15. ANIMATED SKILL BARS — Triggered on scroll
────────────────────────────────────────────────────────── */
function initSkillBars() {
    const bars = qsa('.sb-fill');
    if (!bars.length) return;

    let animated = false;
    const section = qs('.skill-bars-section');
    if (!section) return;

    const io = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting && !animated) {
            animated = true;
            bars.forEach((bar, i) => {
                const target = parseFloat(bar.dataset.w) || 0;
                // Stagger each bar
                setTimeout(() => {
                    bar.style.width = target + '%';
                }, i * 120);
            });
            io.disconnect();
        }
    }, { threshold: 0.4 });

    io.observe(section);
}
