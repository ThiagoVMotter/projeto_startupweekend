// ---- DADOS SIMULADOS DE CUIDADORES ----
const cuidadoresData = [
    {
        id: 1,
        nome: "Maria Silva",
        idade: 32,
        tipo: "crianca",
        experiencia: "5+",
        certificacoes: ["primeiros-socorros", "pedagogia"],
        idiomas: ["portugues", "ingles"],
        preco: 25,
        avaliacao: 4.8,
        totalAvaliacoes: 127,
        localizacao: "São Paulo, SP",
        distancia: 2.5,
        disponibilidade: ["manha", "tarde"],
        descricao: "Pedagoga com mais de 8 anos de experiência em cuidado infantil. Especializada em desenvolvimento cognitivo e atividades educativas.",
        foto: "https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face",
        tags: ["Pedagoga", "Primeiros Socorros", "Bilíngue"]
    },
    {
        id: 2,
        nome: "João Santos",
        idade: 28,
        tipo: "idoso",
        experiencia: "3-5",
        certificacoes: ["enfermagem", "primeiros-socorros"],
        idiomas: ["portugues"],
        preco: 30,
        avaliacao: 4.9,
        totalAvaliacoes: 89,
        localizacao: "São Paulo, SP",
        distancia: 1.8,
        disponibilidade: ["integral"],
        descricao: "Técnico em enfermagem especializado em cuidado geriátrico. Experiência com pacientes com Alzheimer e mobilidade reduzida.",
        foto: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face",
        tags: ["Enfermagem", "Geriátrico", "24h"]
    },
    {
        id: 3,
        nome: "Ana Costa",
        idade: 35,
        tipo: "especial",
        experiencia: "5+",
        certificacoes: ["primeiros-socorros"],
        idiomas: ["portugues", "espanhol"],
        preco: 35,
        avaliacao: 4.7,
        totalAvaliacoes: 156,
        localizacao: "São Paulo, SP",
        distancia: 3.2,
        disponibilidade: ["manha", "tarde", "noite"],
        descricao: "Especialista em necessidades especiais com formação em terapia ocupacional. Experiência com autismo e deficiências físicas.",
        foto: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face",
        tags: ["Necessidades Especiais", "Terapia Ocupacional", "Autismo"]
    },
    {
        id: 4,
        nome: "Carlos Oliveira",
        idade: 26,
        tipo: "pet",
        experiencia: "1-2",
        certificacoes: [],
        idiomas: ["portugues"],
        preco: 20,
        avaliacao: 4.6,
        totalAvaliacoes: 43,
        localizacao: "São Paulo, SP",
        distancia: 4.1,
        disponibilidade: ["manha", "tarde"],
        descricao: "Veterinário recém-formado com paixão por animais. Experiência com cães, gatos e animais exóticos.",
        foto: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face",
        tags: ["Veterinário", "Pet Care", "Animais Exóticos"]
    },
    {
        id: 5,
        nome: "Lucia Ferreira",
        idade: 42,
        tipo: "crianca",
        experiencia: "5+",
        certificacoes: ["primeiros-socorros"],
        idiomas: ["portugues", "ingles", "espanhol"],
        preco: 28,
        avaliacao: 4.9,
        totalAvaliacoes: 203,
        localizacao: "São Paulo, SP",
        distancia: 1.2,
        disponibilidade: ["tarde", "noite"],
        descricao: "Babá experiente com mais de 15 anos de carreira. Especializada em cuidado noturno e rotinas de sono.",
        foto: "https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face",
        tags: ["Babá Experiente", "Cuidado Noturno", "Trilíngue"]
    },
    {
        id: 6,
        nome: "Roberto Lima",
        idade: 38,
        tipo: "idoso",
        experiencia: "5+",
        certificacoes: ["enfermagem", "primeiros-socorros"],
        idiomas: ["portugues"],
        preco: 32,
        avaliacao: 4.8,
        totalAvaliacoes: 167,
        localizacao: "São Paulo, SP",
        distancia: 2.8,
        disponibilidade: ["noite", "madrugada"],
        descricao: "Enfermeiro com especialização em cuidados paliativos. Experiência em hospitais e cuidado domiciliar.",
        foto: "https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=150&h=150&fit=crop&crop=face",
        tags: ["Enfermeiro", "Cuidados Paliativos", "Noturno"]
    }
];

// ---- VARIÁVEIS GLOBAIS ----
let cuidadoresFiltrados = [...cuidadoresData];
let filtrosAtivos = {};

// ---- FUNÇÕES DE INICIALIZAÇÃO ----
document.addEventListener('DOMContentLoaded', function() {
    inicializarEventos();
    exibirCuidadores(cuidadoresData);
});

function inicializarEventos() {
    // Eventos dos sliders de preço
    const precoMin = document.getElementById('preco-min');
    const precoMax = document.getElementById('preco-max');
    
    if (precoMin && precoMax) {
        precoMin.addEventListener('input', atualizarLabelsPreco);
        precoMax.addEventListener('input', atualizarLabelsPreco);
    }
    
    // Evento de busca ao pressionar Enter
    document.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            buscarCuidadores();
        }
    });
}

// ---- FUNÇÕES DE BUSCA E FILTROS ----
function buscarCuidadores() {
    mostrarLoading();
    
    // Simular delay de busca
    setTimeout(() => {
        const tipoCuidado = document.getElementById('tipo-cuidado').value;
        const localizacao = document.getElementById('localizacao').value;
        const data = document.getElementById('data').value;
        const horario = document.getElementById('horario').value;
        
        let resultados = [...cuidadoresData];
        
        // Filtrar por tipo de cuidado
        if (tipoCuidado) {
            resultados = resultados.filter(c => c.tipo === tipoCuidado);
        }
        
        // Filtrar por horário
        if (horario) {
            resultados = resultados.filter(c => 
                c.disponibilidade.includes(horario) || 
                c.disponibilidade.includes('integral')
            );
        }
        
        // Aplicar filtros avançados se existirem
        resultados = aplicarFiltrosAvancados(resultados);
        
        cuidadoresFiltrados = resultados;
        esconderLoading();
        exibirCuidadores(resultados);
        
        // Scroll para resultados
        document.getElementById('resultados').scrollIntoView({ 
            behavior: 'smooth' 
        });
    }, 1500);
}

function aplicarFiltrosAvancados(cuidadores) {
    let resultados = [...cuidadores];
    
    // Filtro de experiência
    const experienciaSelecionada = Array.from(document.querySelectorAll('input[name="experiencia"]:checked'))
        .map(cb => cb.value);
    
    if (experienciaSelecionada.length > 0) {
        resultados = resultados.filter(c => experienciaSelecionada.includes(c.experiencia));
    }
    
    // Filtro de certificações
    const certificacoesSelecionadas = Array.from(document.querySelectorAll('input[name="certificacao"]:checked'))
        .map(cb => cb.value);
    
    if (certificacoesSelecionadas.length > 0) {
        resultados = resultados.filter(c => 
            certificacoesSelecionadas.some(cert => c.certificacoes.includes(cert))
        );
    }
    
    // Filtro de idiomas
    const idiomasSelecionados = Array.from(document.querySelectorAll('input[name="idioma"]:checked'))
        .map(cb => cb.value);
    
    if (idiomasSelecionados.length > 0) {
        resultados = resultados.filter(c => 
            idiomasSelecionados.some(idioma => c.idiomas.includes(idioma))
        );
    }
    
    // Filtro de preço
    const precoMin = parseInt(document.getElementById('preco-min').value);
    const precoMax = parseInt(document.getElementById('preco-max').value);
    
    resultados = resultados.filter(c => c.preco >= precoMin && c.preco <= precoMax);
    
    return resultados;
}

function aplicarFiltros() {
    buscarCuidadores();
}

function limparFiltros() {
    // Limpar checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    
    // Resetar sliders de preço
    document.getElementById('preco-min').value = 15;
    document.getElementById('preco-max').value = 50;
    atualizarLabelsPreco();
    
    // Reexibir todos os cuidadores
    cuidadoresFiltrados = [...cuidadoresData];
    exibirCuidadores(cuidadoresFiltrados);
}

function ordenarResultados() {
    const criterio = document.getElementById('ordenar').value;
    let resultados = [...cuidadoresFiltrados];
    
    switch (criterio) {
        case 'avaliacao':
            resultados.sort((a, b) => b.avaliacao - a.avaliacao);
            break;
        case 'preco-menor':
            resultados.sort((a, b) => a.preco - b.preco);
            break;
        case 'preco-maior':
            resultados.sort((a, b) => b.preco - a.preco);
            break;
        case 'distancia':
            resultados.sort((a, b) => a.distancia - b.distancia);
            break;
        default: // relevancia
            // Manter ordem original
            break;
    }
    
    exibirCuidadores(resultados);
}

// ---- FUNÇÕES DE INTERFACE ----
function toggleFiltros() {
    const filtrosContent = document.getElementById('filtros-content');
    const btnToggle = document.querySelector('.btn-toggle-filtros');
    
    if (filtrosContent.classList.contains('active')) {
        filtrosContent.classList.remove('active');
        btnToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Mostrar Filtros';
    } else {
        filtrosContent.classList.add('active');
        btnToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Ocultar Filtros';
    }
}

function atualizarLabelsPreco() {
    const precoMin = document.getElementById('preco-min').value;
    const precoMax = document.getElementById('preco-max').value;
    
    document.getElementById('preco-min-label').textContent = precoMin;
    document.getElementById('preco-max-label').textContent = precoMax;
}

function mostrarLoading() {
    document.getElementById('loading').style.display = 'block';
    document.getElementById('cuidadores-grid').style.display = 'none';
    document.getElementById('no-results').style.display = 'none';
}

function esconderLoading() {
    document.getElementById('loading').style.display = 'none';
}

// ---- FUNÇÕES DE EXIBIÇÃO ----
function exibirCuidadores(cuidadores) {
    const grid = document.getElementById('cuidadores-grid');
    const noResults = document.getElementById('no-results');
    
    if (cuidadores.length === 0) {
        grid.style.display = 'none';
        noResults.style.display = 'block';
        return;
    }
    
    grid.style.display = 'grid';
    noResults.style.display = 'none';
    
    grid.innerHTML = cuidadores.map(cuidador => criarCardCuidador(cuidador)).join('');
}

function criarCardCuidador(cuidador) {
    const iniciais = cuidador.nome.split(' ').map(n => n[0]).join('');
    const estrelas = gerarEstrelas(cuidador.avaliacao);
    
    return `
        <div class="cuidador-card" onclick="abrirModalCuidador(${cuidador.id})">
            <div class="cuidador-header">
                <div class="cuidador-avatar">${iniciais}</div>
                <div class="cuidador-info">
                    <h4>${cuidador.nome}</h4>
                    <div class="cuidador-rating">
                        <span class="stars">${estrelas}</span>
                        <span class="rating-text">${cuidador.avaliacao} (${cuidador.totalAvaliacoes} avaliações)</span>
                    </div>
                </div>
            </div>
            
            <div class="cuidador-details">
                <div class="detail-item">
                    <i class="fa-solid fa-map-marker-alt"></i>
                    <span>${cuidador.localizacao} • ${cuidador.distancia}km</span>
                </div>
                <div class="detail-item">
                    <i class="fa-solid fa-clock"></i>
                    <span>${formatarDisponibilidade(cuidador.disponibilidade)}</span>
                </div>
                <div class="detail-item">
                    <i class="fa-solid fa-user-check"></i>
                    <span>${formatarExperiencia(cuidador.experiencia)} de experiência</span>
                </div>
            </div>
            
            <div class="cuidador-tags">
                ${cuidador.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
            </div>
            
            <div class="cuidador-footer">
                <div class="preco">R$ ${cuidador.preco}/hora</div>
                <button class="btn-contatar" onclick="event.stopPropagation(); contratarCuidador(${cuidador.id})">
                    Contratar
                </button>
            </div>
        </div>
    `;
}

function gerarEstrelas(avaliacao) {
    const estrelasCompletas = Math.floor(avaliacao);
    const temMeiaEstrela = avaliacao % 1 >= 0.5;
    let estrelas = '';
    
    for (let i = 0; i < estrelasCompletas; i++) {
        estrelas += '★';
    }
    
    if (temMeiaEstrela) {
        estrelas += '☆';
    }
    
    return estrelas;
}

function formatarDisponibilidade(disponibilidade) {
    const periodos = {
        'manha': 'Manhã',
        'tarde': 'Tarde',
        'noite': 'Noite',
        'madrugada': 'Madrugada',
        'integral': '24h'
    };
    
    return disponibilidade.map(p => periodos[p]).join(', ');
}

function formatarExperiencia(experiencia) {
    const exp = {
        '1-2': '1-2 anos',
        '3-5': '3-5 anos',
        '5+': 'Mais de 5 anos'
    };
    
    return exp[experiencia] || experiencia;
}

// ---- FUNÇÕES DO MODAL ----
function abrirModalCuidador(id) {
    const cuidador = cuidadoresData.find(c => c.id === id);
    if (!cuidador) return;
    
    const modal = document.getElementById('modal-cuidador');
    const modalBody = document.getElementById('modal-body');
    
    modalBody.innerHTML = criarConteudoModal(cuidador);
    modal.classList.add('active');
    
    // Fechar modal ao clicar fora
    modal.onclick = function(event) {
        if (event.target === modal) {
            fecharModal();
        }
    };
}

function criarConteudoModal(cuidador) {
    const iniciais = cuidador.nome.split(' ').map(n => n[0]).join('');
    const estrelas = gerarEstrelas(cuidador.avaliacao);
    
    return `
        <div class="modal-header">
            <div class="cuidador-header">
                <div class="cuidador-avatar" style="width: 80px; height: 80px; font-size: 2rem;">${iniciais}</div>
                <div class="cuidador-info">
                    <h2>${cuidador.nome}</h2>
                    <div class="cuidador-rating">
                        <span class="stars">${estrelas}</span>
                        <span class="rating-text">${cuidador.avaliacao} (${cuidador.totalAvaliacoes} avaliações)</span>
                    </div>
                    <p style="margin-top: 0.5rem; color: var(--text-color);">${cuidador.idade} anos • ${cuidador.localizacao}</p>
                </div>
            </div>
        </div>
        
        <div class="modal-section">
            <h3>Sobre</h3>
            <p>${cuidador.descricao}</p>
        </div>
        
        <div class="modal-section">
            <h3>Especialidades</h3>
            <div class="cuidador-tags">
                ${cuidador.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
            </div>
        </div>
        
        <div class="modal-section">
            <h3>Certificações</h3>
            <ul>
                ${cuidador.certificacoes.length > 0 
                    ? cuidador.certificacoes.map(cert => `<li>${formatarCertificacao(cert)}</li>`).join('')
                    : '<li>Nenhuma certificação informada</li>'
                }
            </ul>
        </div>
        
        <div class="modal-section">
            <h3>Idiomas</h3>
            <p>${cuidador.idiomas.map(formatarIdioma).join(', ')}</p>
        </div>
        
        <div class="modal-section">
            <h3>Disponibilidade</h3>
            <p>${formatarDisponibilidade(cuidador.disponibilidade)}</p>
        </div>
        
        <div class="modal-footer">
            <div class="preco" style="font-size: 1.5rem;">R$ ${cuidador.preco}/hora</div>
            <button class="btn btn-primary" onclick="contratarCuidador(${cuidador.id})" style="padding: 12px 24px;">
                Contratar Agora
            </button>
        </div>
    `;
}

function formatarCertificacao(cert) {
    const certificacoes = {
        'primeiros-socorros': 'Primeiros Socorros',
        'enfermagem': 'Técnico em Enfermagem',
        'pedagogia': 'Pedagogia'
    };
    
    return certificacoes[cert] || cert;
}

function formatarIdioma(idioma) {
    const idiomas = {
        'portugues': 'Português',
        'ingles': 'Inglês',
        'espanhol': 'Espanhol'
    };
    
    return idiomas[idioma] || idioma;
}

function fecharModal() {
    const modal = document.getElementById('modal-cuidador');
    modal.classList.remove('active');
}

// ---- FUNÇÕES DE AÇÃO ----
function contratarCuidador(id) {
    const cuidador = cuidadoresData.find(c => c.id === id);
    if (!cuidador) return;
    
    // Simular redirecionamento para login/cadastro
    alert(`Redirecionando para login/cadastro para contratar ${cuidador.nome}...`);
    
    // Aqui você redirecionaria para a página de login/cadastro
    // window.location.href = 'login.html?cuidador=' + id;
}

// ---- ESTILOS ADICIONAIS PARA O MODAL ----
const modalStyles = `
    .modal-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .modal-section {
        margin-bottom: 1.5rem;
    }
    
    .modal-section h3 {
        color: var(--primary-color);
        margin-bottom: 0.8rem;
        font-size: 1.2rem;
    }
    
    .modal-section ul {
        padding-left: 1.2rem;
    }
    
    .modal-section li {
        margin-bottom: 0.3rem;
        color: var(--text-color);
    }
    
    .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
        margin-top: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .modal-footer {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
    }
`;

// Adicionar estilos do modal ao head
const styleSheet = document.createElement('style');
styleSheet.textContent = modalStyles;
document.head.appendChild(styleSheet);

