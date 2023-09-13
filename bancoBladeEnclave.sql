create database dbBlade
default character set utf8
default collate utf8_general_ci;

use dbBlade;

-- Criando tabela de Categorias
create table tbCategoria(

cdCategoria int primary key auto_increment,
dsCategoria varchar(25) not null
)
default character set utf8;
-- Criando tabela de Produtos
create table tbProdutos(

cdProd int primary key auto_increment,
nmProd varchar(70) not null,
vlProd decimal(6,2) not null ,
cdCategoria int not null,
qtEstoque int not null,
ResumoProd text not null,
ImgProd varchar(255) not null,
sgLancamento enum('S','N') not null,
constraint fk_Cat foreign key (cdCategoria) references tbCategoria(cdCategoria)

)
default character set utf8;

-- inserindo dados na tabela de Categoria
insert into tbCategoria(dsCategoria)
values('Katanas'),
	  ('Espadas Longas'),
      ('Adagas'),
	  ('Jian');

-- inserindo dados na tabela de Produtos  

-- Espadas Longas    
insert into tbProdutos
		values(default, 'Zweihänder', 3567.09, 2, 2,
		"<p> A Zweihänder é uma espada grande e pesada, com uma lâmina de dois gumes que pode chegar a quase dois metros de comprimento.
		 Sua empunhadura é longa o suficiente para acomodar duas mãos, o que a torna eficaz tanto para ataques cortantes quanto perfurantes
		A Zweihänder era principalmente uma arma de guerra utilizada por soldados de infantaria, 
		especialmente na Alemanha durante o século XVI. Devido ao seu tamanho e peso, era eficaz
		 para desferir golpes poderosos em combate corpo a corpo. </p>", 'Zwei','N'),
       (default, 'Claymore', 7231.99, 2, 7,
		"<p> A espada Claymore é uma espada histórica escocesa que se destacou durante o final da 
        Idade Média e o início da Era Moderna, especialmente nos séculos XVI e XVII. 
        Aqui está um pequeno resumo sobre a espada Claymore:
          Claymore é uma espada de lâmina larga, geralmente de dois gumes e de grande tamanho,
          que era usada pelos guerreiros escoceses, incluindo os Highlanders.
          Ela era uma arma versátil que podia ser usada tanto para ataques cortantes quanto para 
          perfurações. A característica mais notável da Claymore era o seu cabo longo, que permitia
          que a espada fosse empunhada com as duas mãos, proporcionando maior alcance e poder de corte. </p>", 
          'Clay','S'),

-- Katanas
	  (default, 'Koshi Sori O Kissaki', 4221.59, 1, 1,
	   "<p> Prepare-se para experimentar a fusão perfeita de arte e habilidade com a nossa incrível 
       katana Koshi Sori O Kissaki. Esta deslumbrante obra-prima da espada é muito mais do que uma
       simples lâmina; é uma manifestação da tradição samurai em sua forma mais refinada.
Lâmina Excepcional: A lâmina Koshi Sori O Kissaki é forjada com maestria por artesãos habilidosos, 
combinando aço de alta qualidade com uma curvatura distinta e uma ponta aguçada e equilibrada para 
precisão. </p>", 'Koshi','S'),
	  (default, 'Gold Lion Wakizashi', 7212.50, 1, 4,
	   "<p> Bem-vindo à nossa loja, onde a tradição samurai encontra a elegância atemporal. 
       Apresentamos a você o Gold Lion Wakizashi, uma obra-prima que incorpora a essência da cultura
       japonesa em uma lâmina única.
Lâmina Lendária: A lâmina do Gold Lion Wakizashi é forjada com precisão, 
usando métodos tradicionais transmitidos por gerações. Feita de aço de alta qualidade, 
ela é afiada com maestria e decorada com gravuras que retratam a majestade de um leão dourado. </p>", 'Waki','N'),

-- Adagas
  (default, 'Espada FATE Gan Jiang and Mo Ye', 4032.22, 3, 14,
	   "<p>
As espadas 'Gan Jiang' e 'Mo Ye' são as duas armas principais de Archer (Shirou Emiya) no anime 'Fate/stay night'. 
Aqui está um resumo das espadas:
Gan Jiang (Yang Sword):
A Gan Jiang é baseada em uma das duas lendárias espadas chinesas, Gan Jiang e Mo Ye, que foram forjadas pelo casal de ferreiros homônimo na mitologia chinesa.
 A espada Gan Jiang de Archer é uma lâmina longa, fina e elegante, com um brilho dourado. Ela emana uma aura de nobreza e poder. 
 Mo Ye (Yin Sword): Mo Ye é a contrapartida de Gan Jiang, complementando sua natureza yang (fogo) com a natureza yin (água). Ela também é baseada na segunda espada lendária na mitologia chinesa.
Mo Ye tem uma aparência que contrasta com a Gan Jiang, 
sendo uma espada de lâmina larga e azulada.
 Ela reflete a dualidade de poder entre as duas espadas.</p>", 'fate','S'),
 
   (default, 'Adaga Javalizeira', 7212.50, 3, 4,
	   "<p>A Adaga Javalizeira é uma criação singular que une a versatilidade
       de uma adaga com a potência de um arremesso de lança. Seu design inovador a torn
       a uma escolha excepcional para aqueles que buscam a combinação perfeita de alcance e
       letalidade em uma única arma. </p>", 'Java','N'),

-- Jian

 (default, 'Espada Jian Hsu ', 7212.50, 4, 1,
	 "<p>Tradicionalmente, a Jian Hsu é forjada com aço de alta qualidade, tornando-a afiada 
       e resistente. O processo de forjamento é frequentemente uma demonstração de habilidade artesanal.
Guarda-Mão Ornamentada: A guarda-mão da Jian é frequentemente adornada com detalhes
 intrincados e esculpidos à mão, representando temas da cultura chinesa, como dragões, 
 fênix ou símbolos de longevidade. </p>", 'Hsu','N'),
       
 (default, 'Taiji Bagua Jian', 4111.32, 4, 8,
	   "<p>Taiji Bagua Jian é uma espada que se originou das tradições de Tai Chi e Baguazhang,
       duas das artes marciais internas mais renomadas da China. Essas artes enfatizam o 
       equilíbrio, a fluidez e a conexão mente-corpo.
Lâmina de Precisão: A espada Jian é reconhecida por sua lâmina longa, reta e fina, 
que é projetada para cortes precisos e estocadas rápidas. A Taiji Bagua Jian incorpora
 movimentos graciosos que tiram o máximo proveito dessa lâmina. </p>", 'Tai','S');

 select * from tbProdutos;
 
 -- InnerJoin juntando as 2 tabelas e criação da View
 
 create View Vw_Prod
as select cdProd,nmProd,vlProd, qtEstoque,ResumoProd,ImgProd,sgLancamento,dsCategoria from tbProdutos
Inner join tbCategoria
where tbProdutos.cdCategoria = tbCategoria.cdCategoria;
 
 select * from Vw_Prod;
-- criando usuario e senha
 create user 'blade'@'localhost' identified with mysql_native_password by  '12345678';
 
 -- dando privilegios ao usuario criado
 grant all privileges on dbBlade. * to 'blade'@'localhost' with grant option;