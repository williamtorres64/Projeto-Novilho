use novilho;

-- TABELAS DE DOMÍNIO
INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Bovinos'),
(2, 'Aves'),
(3, 'Suínos'),
(4, 'Peixes'),
(5, 'Bebidas'),
(6, 'Churrasco');

INSERT INTO `formaPagamento` (`id`, `nome`) VALUES
(1, 'PIX'),
(2, 'Dinheiro'),
(3, 'Débito'),
(4, 'Crédito');

INSERT INTO `tipoQuantidade` (`id`, `tipo`) VALUES
(1, 'Inteiro'),
(2, 'Decimal');

INSERT INTO `tipoUsuario`(`nome`) VALUES ('Cliente'),('Administrador');

INSERT INTO `status` (`id`, `nome`) VALUES
(1, 'Pendente'),
(2, 'Concluído'),
(3, 'Em Preparo'),
(4, 'Enviado'),
(5, 'Cancelado');


-- DADOS FICTÍCIOS
INSERT INTO `usuario` (`id`, `cpf`, `nome`, `endereco`, `enderecoNumero`, `complemento`, `cep`, `email`, `senha`, `telefone`, `tipoId`) VALUES
(1, '11111111111', 'Fulano da Silva 1', 'Rua Imaginaria 1', '123', 'Apto 101', '11111111', 'fulano1.silva@email.com', 'senha123', '11111111111', 1),
(2, '22222222222', 'Ciclana Souza 2', 'Avenida Inexistente 2', '456', 'Casa 2', '22222222', 'ciclana2.souza@email.com', 'senha456', '11111111111', 1),
(3, '33333333333', 'Beltrano Oliveira 3', 'Travessa Fantasma 3', '789', '', '33333333', 'beltrano3.oliveira@email.com', 'senha789', '11111111111', 1),
(4, '44444444444', 'Josefina Costa 4', 'Alameda Virtual 4', '1011', 'Sala 3', '44444444', 'josefina4.costa@email.com', 'senhaabc', '11111111111', 1),
(5, '55555555555', 'Antonio Pereira 5', 'Praça Irreal 5', '1213', '', '55555555', 'antonio5.pereira@email.com', 'senha_def','11111111111', 1),
(6, '66666666666', 'Mariana Almeida 6', 'Estrada Ficticia 6', '1415', 'Bloco C', '66666666', 'mariana6.almeida@email.com', 'senha_ghi', '11111111111', 1),
(7, '77777777777', 'Lucas Santos 7', 'Rua dos Sonhos 7', '1617', 'Fundos', '77777777', 'lucas7.santos@email.com', 'senha_jkl', '11111111111', 1),
(8, '88888888888', 'Fernanda Lima 8', 'Avenida da Imaginação 8', '1819', '', '88888888', 'fernanda8.lima@email.com', 'senha_mno', '11111111111', 1),
(9, '99999999999', 'Rafael Rocha 9', 'Viela Escondida 9', '2021', 'Casa da Frente', '99999999', 'rafael9.rocha@email.com', 'senha_pqr', '11111111111', 1),
(10, '99654399999', 'Rafael Rocha 9', 'Viela Escondida 9', '2021', 'Casa da Frente', '94599999', 'rafae20.rocha@email.com', 'senha_pqr', '11114411111', 1),
(11, '00456700000', 'Administrador', 'Rua 404', '404', 'Apto 505', '00000000', 'admin@gmail.com', '123', '11112345111', 2);

-- PRODUTOS – dados coerentes
DELETE FROM produto;                     -- opcional: limpa tabela antes
INSERT INTO `produto`
(`nome`, `categoriaId`, `valor`, `descricao`, `nomeImagem`, `tipoQuantidadeId`) VALUES
('Picanha Uruguaia',              1, ROUND(RAND()*150+50,2),  'Deliciosa picanha de origem Uruguaia, macia e suculenta.',                     'imagens/picanha_uruguaia.png',        2),
('Carvão Vegetal 5kg',            6, ROUND(RAND()*40 +15,2),  'Saco de carvão de reflorestamento de alta qualidade para seu churrasco.',      'imagens/carvao_5kg.png',              1),
('Cerveja Artesanal IPA',         5, ROUND(RAND()*20 + 8,2),  'Cerveja IPA lupulada e refrescante, perfeita para acompanhar carnes grelhadas.','imagens/cerveja_ipa.png',             1),
('Linguiça Toscana Tradicional',  3, ROUND(RAND()*35 +15,2),  'Linguiça toscana suína frescal com tempero tradicional.',                      'imagens/linguica_toscana.png',        2),
('Kit Utensílios para Churrasco', 6, ROUND(RAND()*100+50,2),  'Conjunto com garfo trinchante, faca e pegador para churrasco.',                'imagens/kit_utensilios.png',          1),
('Entrecôte Angus',               1, ROUND(RAND()*180+60,2),  'Corte nobre de Entrecôte Angus, marmorizado e saboroso.',                      'imagens/entrecote_angus.png',         2),
('Refrigerante Cola 2L',          5, ROUND(RAND()*10 + 4,2),  'Refrigerante sabor cola em garrafa PET de 2 litros.',                          'imagens/refri_cola_2l.png',           1),
('Pão de Alho Tradicional',       6, ROUND(RAND()*15 + 5,2),  'Delicioso pão de alho pronto para assar na brasa.',                             'imagens/pao_de_alho.png',             1),
('Assado de Tira',                1, ROUND(RAND()*160+50,2),  'Corte clássico para churrasco, muito saboroso e suculento.',                   'imagens/assado_de_tira.png',          2),
('Água Mineral sem Gás 1.5L',     5, ROUND(RAND()*5  + 2,2),  'Garrafa de água mineral natural sem gás.',                                     'imagens/agua_sem_gas.png',            1),
('Maminha Maturada',              1, ROUND(RAND()*140+40,2),  'Maminha selecionada e maturada para garantir maciez extra.',                  'imagens/maminha_maturada.png',        2),
('Sal Grosso para Churrasco',     6, ROUND(RAND()*12 + 5,2),  'Sal grosso iodado ideal para temperar carnes na brasa.',                       'imagens/sal_grosso.png',              1),
('Cerveja Lager Nacional',        5, ROUND(RAND()*10 + 4,2),  'Cerveja Lager leve e refrescante.',                                            'imagens/cerveja_lager.png',           1),
('Fraldinha Red Series',          1, ROUND(RAND()*130+40,2),  'Corte especial de fraldinha com fibras macias e sabor acentuado.',             'imagens/fraldinha_red.png',           2),
('Espeto Duplo Cromado',          6, ROUND(RAND()*30 +10,2),  'Espeto duplo resistente com acabamento cromado.',                              'imagens/espeto_duplo.png',            1),
('Queijo Coalho Tradicional',     6, ROUND(RAND()*25 +10,2),  'Queijo coalho frescal, perfeito para assar no churrasco.',                     'imagens/queijo_coalho.png',           1),
('Costela Janela Bovina',         1, ROUND(RAND()*90 +30,2),  'Corte suculento da costela bovina, ideal para longos períodos de cozimento.',  'imagens/costela_janela.png',          2),
('Guaraná Antartica 2L',          5, ROUND(RAND()*10 + 4,2),  'Refrigerante sabor guaraná em garrafa PET de 2 litros.',                       'imagens/guarana_2l.png',              1),
('Farofa Tradicional Pronta',     6, ROUND(RAND()*18 + 7,2),  'Farofa temperada pronta para acompanhar seu churrasco.',                       'imagens/farofa_pronta.png',           1),
('Sobrecoxa de Frango Temperada', 2, ROUND(RAND()*20 + 8,2),  'Sobrecoxa de frango temperada, pronta para grelhar.',                          'imagens/sobrecoxa_temperada.png',     2),
('Contra Filé Grill',             1, ROUND(RAND()*170+55,2),  'Corte macio, ideal para grelhar, com boa capa de gordura.',                    'imagens/contrafile_grill.png',        2),
('Asa de Frango Temperada',       2, ROUND(RAND()*25 +10,2),  'Asas de frango marinadas em tempero especial.',                                'imagens/asa_frango_temp.png',         2),
('Pack Cerveja Lager (12 latas)', 5, ROUND(RAND()*50 +20,2),  'Pacote com 12 latas de cerveja Lager.',                                        'imagens/pack_lager_12.png',           1),
('Faca para Churrasco 8"',        6, ROUND(RAND()*80 +30,2),  'Faca de aço inoxidável com lâmina de 8".',                                      'imagens/faca_churrasco8.png',         1),
('Queijo Mussarela Trançado',     6, ROUND(RAND()*40 +15,2),  'Queijo mussarela trançado, delicioso grelhado.',                               'imagens/mussarela_trancado.png',      1),
('Cupim Bovino',                  1, ROUND(RAND()*80 +30,2),  'Corte com gordura entremeada, ideal para longos cozimentos.',                  'imagens/cupim_bovino.png',            2),
('Água Tônica Lata',              5, ROUND(RAND()*6  + 3,2),  'Lata de água tônica, refrescante e versátil.',                                 'imagens/agua_tonica_lata.png',        1),
('Linguiça de Frango com Queijo', 2, ROUND(RAND()*32 +18,2),  'Linguiça de frango recheada com queijo.',                                      'imagens/linguica_frango_queijo.png',  2),
('Avental para Churrasqueiro',    6, ROUND(RAND()*60 +25,2),  'Avental resistente para proteger durante o churrasco.',                        'imagens/avental_churras.png',         1),
('Maminha Grill',                 1, ROUND(RAND()*130+45,2),  'Corte macio da maminha, ótimo para grelhar.',                                  'imagens/maminha_grill.png',           2),
('Suco de Laranja Integral 1L',   5, ROUND(RAND()*12 + 5,2),  'Suco de laranja 100% integral, sem adição de açúcar.',                         'imagens/suco_laranja_1l.png',         1),
('Ponta do Peito Bovina',         1, ROUND(RAND()*75 +25,2),  'Corte dianteiro saboroso quando cozido lentamente.',                           'imagens/ponta_peito.png',             2),
('Molho Barbecue Tradicional',    6, ROUND(RAND()*18 + 7,2),  'Molho barbecue clássico para acompanhar carnes.',                              'imagens/molho_bbq.png',               1);

-- USUARIO CARRINHO – 30 linhas
DELETE FROM usuarioCarrinho;      -- opcional
INSERT INTO `usuarioCarrinho`
(`usuarioId`, `produtoId`, `quantidade`, `tipoQuantidadeId`) VALUES
(1,  1,  1.25, 2),
(2,  2,  2,    1),
(3,  5,  1,    1),
(4,  6,  0.80, 2),
(5,  7,  3,    1),
(6,  9,  1.50, 2),
(7, 12,  2,    1),
(8, 14,  0.90, 2),
(9, 15,  4,    1),
(10,18,  2,    1),
(1, 20,  1.20, 2),
(2, 22,  0.75, 2),
(3, 23,  1,    1),
(4, 24,  1,    1),
(5, 25,  2,    1),
(6, 26,  1.30, 2),
(7, 27,  6,    1),
(8, 28,  0.65, 2),
(9, 29,  1,    1),
(10,30,  0.95, 2),
(1, 31,  2,    1),
(2, 32,  1.40, 2),
(3, 33,  3,    1),
(4,  3,  2,    1),
(5,  4,  1.10, 2),
(6, 10,  1,    1),
(7, 11,  1.80, 2),
(8, 13,  6,    1),
(9, 17,  1.05, 2),
(10,19,  3,    1);

INSERT INTO `compra` (`usuarioId`, `data`, `formaPagamentoId`, `statusId`) VALUES
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1),
(FLOOR(RAND() * 10) + 1, DATE_ADD(CURDATE(), INTERVAL FLOOR(RAND() * 41) - 30 DAY), FLOOR(RAND() * 3) + 1, FLOOR(RAND() * 2) + 1);

-- COMPRA PRODUTO – idCompra 1-10
DELETE FROM compraProduto;        -- opcional
INSERT INTO `compraProduto`
(`idCompra`, `idProduto`, `valor`, `quantidade`, `tipoQuantidadeId`) VALUES
(FLOOR(RAND()*10)+1, 1,  ROUND(RAND()*200+10,2), 1.30, 2),
(FLOOR(RAND()*10)+1, 2,  ROUND(RAND()* 50+10,2), 2,    1),
(FLOOR(RAND()*10)+1, 4,  ROUND(RAND()*120+20,2), 0.85, 2),
(FLOOR(RAND()*10)+1, 5,  ROUND(RAND()*150+30,2), 1,    1),
(FLOOR(RAND()*10)+1, 6,  ROUND(RAND()*220+40,2), 1.10, 2),
(FLOOR(RAND()*10)+1, 7,  ROUND(RAND()* 15+ 4,2), 3,    1),
(FLOOR(RAND()*10)+1, 9,  ROUND(RAND()*190+50,2), 0.90, 2),
(FLOOR(RAND()*10)+1,12,  ROUND(RAND()* 20+ 5,2), 2,    1),
(FLOOR(RAND()*10)+1,13,  ROUND(RAND()* 12+ 4,2), 2,    1),
(FLOOR(RAND()*10)+1,14,  ROUND(RAND()*180+40,2), 1.00, 2),
(FLOOR(RAND()*10)+1,15,  ROUND(RAND()* 40+10,2), 2,    1),
(FLOOR(RAND()*10)+1,17,  ROUND(RAND()*120+30,2), 1.25, 2),
(FLOOR(RAND()*10)+1,18,  ROUND(RAND()* 12+ 4,2), 2,    1),
(FLOOR(RAND()*10)+1,19,  ROUND(RAND()* 22+ 7,2), 1,    1),
(FLOOR(RAND()*10)+1,20,  ROUND(RAND()* 25+ 8,2), 0.70, 2),
(FLOOR(RAND()*10)+1,21,  ROUND(RAND()*210+55,2), 1.15, 2),
(FLOOR(RAND()*10)+1,22,  ROUND(RAND()* 30+10,2), 0.80, 2),
(FLOOR(RAND()*10)+1,23,  ROUND(RAND()* 80+20,2), 1,    1),
(FLOOR(RAND()*10)+1,24,  ROUND(RAND()*100+30,2), 1,    1),
(FLOOR(RAND()*10)+1,25,  ROUND(RAND()* 50+15,2), 2,    1),
(FLOOR(RAND()*10)+1,26,  ROUND(RAND()*140+30,2), 1.60, 2),
(FLOOR(RAND()*10)+1,27,  ROUND(RAND()* 10+ 3,2), 6,    1),
(FLOOR(RAND()*10)+1,28,  ROUND(RAND()* 42+18,2), 0.60, 2),
(FLOOR(RAND()*10)+1,29,  ROUND(RAND()* 90+25,2), 1,    1),
(FLOOR(RAND()*10)+1,30,  ROUND(RAND()*190+45,2), 1.05, 2),
(FLOOR(RAND()*10)+1,31,  ROUND(RAND()* 15+ 5,2), 2,    1),
(FLOOR(RAND()*10)+1,32,  ROUND(RAND()*130+25,2), 1.40, 2),
(FLOOR(RAND()*10)+1,33,  ROUND(RAND()* 25+ 7,2), 1,    1),
(FLOOR(RAND()*10)+1, 3,  ROUND(RAND()* 30+ 8,2), 2,    1),
(FLOOR(RAND()*10)+1,11,  ROUND(RAND()*160+40,2), 1.20, 2);

