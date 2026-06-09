/* ============================================
   GRUPO DE JOVENS EMAÚS – script.js
   ============================================ */

// ---- DADOS ----
const versiculos = [
  { texto: '"Porque sou eu que conheço os planos que tenho para vocês, diz o Senhor, planos de fazê-los prosperar e não de causar dano, planos de dar a vocês esperança e um futuro."', ref: '— Jeremias 29,11' },
  { texto: '"Não deixeis que alguém vos despreze por serdes jovens."', ref: '— 1 Timóteo 4,12' },
  { texto: '"Tudo posso naquele que me fortalece."', ref: '— Filipenses 4,13' },
  { texto: '"Busquem, pois, em primeiro lugar o Reino de Deus e a sua justiça, e todas essas coisas serão acrescentadas a vocês."', ref: '— Mateus 6,33' },
  { texto: '"O Senhor é o meu pastor, nada me faltará."', ref: '— Salmo 23,1' },
  { texto: '"Porque Deus amou o mundo de tal maneira que deu o seu Filho unigênito, para que todo aquele que nele crê não pereça, mas tenha a vida eterna."', ref: '— João 3,16' },
  { texto: '"Alegrai-vos sempre no Senhor; repito: alegrai-vos."', ref: '— Filipenses 4,4' },
  { texto: '"Confia no Senhor de todo o teu coração e não te apoies em tua própria prudência."', ref: '— Provérbios 3,5' },
  { texto: '"Sede fortes e corajosos. Não tenhais medo, não vos aterrorizeis, porque o Senhor vosso Deus está convosco."', ref: '— Josué 1,9' },
  { texto: '"Eu sou o caminho, a verdade e a vida. Ninguém vem ao Pai senão por mim."', ref: '— João 14,6' },
];

const header = document.getElementById('header');
const backToTop = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY;

  if (scrollY > 60) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }

  if (scrollY > 400) {
    backToTop.classList.add('visible');
  } else {
    backToTop.classList.remove('visible');
  }

  highlightNavLink();
});

// ---- NAV: link ativo por seção ----
function highlightNavLink() {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-links a');
  let current = '';

  sections.forEach(sec => {
    if (window.scrollY + 120 >= sec.offsetTop) current = sec.id;
  });

  navLinks.forEach(a => {
    a.classList.remove('active');
    if (a.getAttribute('href') === '#' + current) a.classList.add('active');
  });
}

// ---- HAMBURGER MENU ----
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav').querySelector('.nav-links');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('open');
  navLinks.classList.toggle('open');
  document.body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
});

navLinks.querySelectorAll('a').forEach(a => {
  a.addEventListener('click', () => {
    hamburger.classList.remove('open');
    navLinks.classList.remove('open');
    document.body.style.overflow = '';
  });
});

// ---- CONTADOR ANIMADO (Sobre) ----
function animateCount(el) {
  const target = parseInt(el.dataset.target, 10);
  const duration = 1800;
  const step = 16;
  const increment = target / (duration / step);
  let current = 0;

  const timer = setInterval(() => {
    current += increment;
    if (current >= target) {
      el.textContent = target.toLocaleString('pt-BR') + (target >= 100 ? '+' : '');
      clearInterval(timer);
    } else {
      el.textContent = Math.floor(current).toLocaleString('pt-BR');
    }
  }, step);
}

const statObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateCount(entry.target);
      statObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-number').forEach(el => statObserver.observe(el));

// ---- FADE-IN ao scroll ----
const fadeEls = document.querySelectorAll(
  '.card-stat, .reuniao-card, .evento-card, .galeria-item, .contato-form, .contato-info, .sobre-text'
);

const fadeObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      fadeObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

fadeEls.forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(20px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  fadeObserver.observe(el);
});

document.addEventListener('DOMContentLoaded', () => {
  // Adiciona a classe .visible que revela os elementos
  document.head.insertAdjacentHTML('beforeend', `<style>.visible{opacity:1!important;transform:none!important;}</style>`);
});

// ---- GALERIA: lightbox simples ----
document.querySelectorAll('.galeria-item').forEach((item, i) => {
  item.addEventListener('click', () => {
    const label = item.querySelector('.galeria-overlay span')?.textContent || 'Foto';
    const overlay = document.createElement('div');
    overlay.style.cssText = `
      position:fixed; inset:0; background:rgba(0,0,0,0.88);
      display:flex; align-items:center; justify-content:center;
      z-index:9999; cursor:pointer; flex-direction:column; gap:1rem;
    `;
    overlay.innerHTML = `
      <div style="
        width:min(90vw,500px); height:300px;
        background: linear-gradient(135deg, ${getComputedStyle(item).backgroundColor}, #000a);
        border-radius:12px; display:flex; align-items:center; justify-content:center;
        font-size:4rem; color:rgba(255,255,255,0.2); font-family:'Cinzel',serif;
      ">✝</div>
      <p style="color:#fff; font-family:'Lato',sans-serif; font-size:1.1rem; font-weight:700; letter-spacing:2px; text-transform:uppercase;">
        ${label}
      </p>
      <p style="color:rgba(255,255,255,0.45); font-size:0.8rem;">Clique para fechar</p>
    `;
    overlay.addEventListener('click', () => overlay.remove());
    document.body.appendChild(overlay);
  });
});

// ---- FORMULÁRIO: validação ----
const form = document.getElementById('contato-form');

if (form) {
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let valid = true;

    const campos = [
      { id: 'nome', errId: 'erro-nome', msg: 'Por favor, informe seu nome.' },
      { id: 'email', errId: 'erro-email', msg: 'Por favor, informe um e-mail válido.' },
      { id: 'mensagem', errId: 'erro-mensagem', msg: 'Por favor, escreva sua mensagem.' },
    ];

    campos.forEach(({ id, errId, msg }) => {
      const el = document.getElementById(id);
      const err = document.getElementById(errId);
      const val = el.value.trim();
      let ok = val.length > 0;

      if (id === 'email') {
        ok = ok && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
      }

      if (!ok) {
        el.classList.add('invalid');
        err.textContent = msg;
        valid = false;
      } else {
        el.classList.remove('invalid');
        err.textContent = '';
      }
    });

    if (valid) {
      const successEl = document.getElementById('form-success');
      successEl.textContent = '✓ Mensagem enviada! Entraremos em contato em breve.';
      form.reset();
      setTimeout(() => { successEl.textContent = ''; }, 5000);
    }
  });

  // Limpa erros ao digitar
  form.querySelectorAll('input, textarea').forEach(el => {
    el.addEventListener('input', () => {
      el.classList.remove('invalid');
      const errEl = document.getElementById('erro-' + el.id);
      if (errEl) errEl.textContent = '';
    });
  });
}

document.addEventListener('click', function(e) {
  const target = e.target.closest('#scrollDown');
  if (!target) return;
  const hero = target.closest('.hero');
  const next = hero ? hero.nextElementSibling : null;
  if (next) {
    next.scrollIntoView({ behavior: 'smooth' });
  }
});

// ---- DEBUG: seletor de data para testar cores litúrgicas ----
(function() {
  const dbg = document.getElementById('debug-toggle');
  const panel = document.getElementById('debug-panel');
  if (!dbg || !panel) return;

  dbg.addEventListener('click', function(e) {
    e.stopPropagation();
    panel.classList.toggle('show');
  });

  document.addEventListener('click', function() {
    panel.classList.remove('show');
  });
  panel.addEventListener('click', function(e) {
    e.stopPropagation();
  });

  document.getElementById('debug-go').addEventListener('click', function() {
    const val = document.getElementById('debug-date').value;
    if (val) {
      window.location.href = '?data=' + val;
    }
  });

  document.getElementById('debug-today').addEventListener('click', function() {
    window.location.href = '/';
  });
})();
