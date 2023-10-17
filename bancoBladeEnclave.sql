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
		values(default, 'Zweihänder', 3567.09, 2, 0,
		"<p> A Zweihänder é uma espada grande e pesada, com uma lâmina de dois gumes que pode chegar a quase dois metros de comprimento.
		 Sua empunhadura é longa o suficiente para acomodar duas mãos, o que a torna eficaz tanto para ataques cortantes quanto perfurantes
		A Zweihänder era principalmente uma arma de guerra utilizada por soldados de infantaria, 
		especialmente na Alemanha durante o século XVI. Devido ao seu tamanho e peso, era eficaz
		 para desferir golpes poderosos em combate corpo a corpo. </p>", 'Zwei.jpg','N'),
       (default, 'Claymore', 7231.99, 2, 7,
		"<p> A espada Claymore é uma espada histórica escocesa que se destacou durante o final da 
        Idade Média e o início da Era Moderna, especialmente nos séculos XVI e XVII. 
        Aqui está um pequeno resumo sobre a espada Claymore:
          Claymore é uma espada de lâmina larga, geralmente de dois gumes e de grande tamanho,
          que era usada pelos guerreiros escoceses, incluindo os Highlanders.
          Ela era uma arma versátil que podia ser usada tanto para ataques cortantes quanto para 
          perfurações. A característica mais notável da Claymore era o seu cabo longo, que permitia
          que a espada fosse empunhada com as duas mãos, proporcionando maior alcance e poder de corte. </p>", 
          'Clay.jpg','S'),

-- Katanas
	  (default, 'Koshi Sori O Kissaki', 4221.59, 1, 1,
	   "<p> Prepare-se para experimentar a fusão perfeita de arte e habilidade com a nossa incrível 
       katana Koshi Sori O Kissaki. Esta deslumbrante obra-prima da espada é muito mais do que uma
       simples lâmina; é uma manifestação da tradição samurai em sua forma mais refinada.
Lâmina Excepcional: A lâmina Koshi Sori O Kissaki é forjada com maestria por artesãos habilidosos, 
combinando aço de alta qualidade com uma curvatura distinta e uma ponta aguçada e equilibrada para 
precisão. </p>", 'Koshi.jpg','S'),
	  (default, 'Gold Lion Wakizashi', 7212.50, 1, 4,
	   "<p> Bem-vindo à nossa loja, onde a tradição samurai encontra a elegância atemporal. 
       Apresentamos a você o Gold Lion Wakizashi, uma obra-prima que incorpora a essência da cultura
       japonesa em uma lâmina única.
Lâmina Lendária: A lâmina do Gold Lion Wakizashi é forjada com precisão, 
usando métodos tradicionais transmitidos por gerações. Feita de aço de alta qualidade, 
ela é afiada com maestria e decorada com gravuras que retratam a majestade de um leão dourado. </p>", 'Waki.jpg','N'),

-- Adagas
  (default, 'Gan Jiang and Mo Ye', 4032.22, 3, 14,
	   "<p>
As espadas 'Gan Jiang' e 'Mo Ye' são as duas armas principais de Archer (Shirou Emiya) no anime 'Fate/stay night'. 
Aqui está um resumo das espadas:
Gan Jiang (Yang Sword):
A Gan Jiang é baseada em uma das duas lendárias espadas chinesas, Gan Jiang e Mo Ye, que foram forjadas pelo casal de ferreiros homônimo na mitologia chinesa.
 A espada Gan Jiang de Archer é uma lâmina longa, fina e elegante, com um brilho dourado. Ela emana uma aura de nobreza e poder. 
 Mo Ye (Yin Sword): Mo Ye é a contrapartida de Gan Jiang, complementando sua natureza yang (fogo) com a natureza yin (água). Ela também é baseada na segunda espada lendária na mitologia chinesa.
Mo Ye tem uma aparência que contrasta com a Gan Jiang, 
sendo uma espada de lâmina larga e azulada.
 Ela reflete a dualidade de poder entre as duas espadas.</p>", 'fate.jpg','S'),
 
   (default, 'Adaga Javalizeira', 7212.50, 3, 4,
	   "<p>A Adaga Javalizeira é uma criação singular que une a versatilidade
       de uma adaga com a potência de um arremesso de lança. Seu design inovador a torn
       a uma escolha excepcional para aqueles que buscam a combinação perfeita de alcance e
       letalidade em uma única arma. </p>", 'Java.jpg','N'),

-- Jian

 (default, 'Espada Jian Hsu ', 7212.50, 4, 1,
	 "<p>Tradicionalmente, a Jian Hsu é forjada com aço de alta qualidade, tornando-a afiada 
       e resistente. O processo de forjamento é frequentemente uma demonstração de habilidade artesanal.
Guarda-Mão Ornamentada: A guarda-mão da Jian é frequentemente adornada com detalhes
 intrincados e esculpidos à mão, representando temas da cultura chinesa, como dragões, 
 fênix ou símbolos de longevidade. </p>", 'Hsu.jpg','N'),
       
 (default, 'Taiji Bagua Jian', 4111.32, 4, 8,
	   "<p>Taiji Bagua Jian é uma espada que se originou das tradições de Tai Chi e Baguazhang,
       duas das artes marciais internas mais renomadas da China. Essas artes enfatizam o 
       equilíbrio, a fluidez e a conexão mente-corpo.
Lâmina de Precisão: A espada Jian é reconhecida por sua lâmina longa, reta e fina, 
que é projetada para cortes precisos e estocadas rápidas. A Taiji Bagua Jian incorpora
 movimentos graciosos que tiram o máximo proveito dessa lâmina. </p>", 'Tai.jpg','S');

 select * from tbProdutos;
 
 -- InnerJoin juntando as 2 tabelas e criação da View 
 
 create View VwProdDetalhes
as select cdProd,nmProd,vlProd, qtEstoque,ResumoProd,ImgProd,sgLancamento,dsCategoria from tbProdutos
Inner join tbCategoria
where tbProdutos.cdCategoria = tbCategoria.cdCategoria;
 
-- criando usuario e senha
 create user 'blade'@'localhost' identified with mysql_native_password by  '12345678';
 
 -- dando privilegios ao usuario criado
 grant all privileges on dbBlade. * to 'blade'@'localhost' with grant option;
 
 delimiter //
 
-- Procedure com a view com Inner Join

CREATE  PROCEDURE listarProdutosDetalhes(vCod int)

begin
 
 select * from VwProdDetalhes
 where cdProd = vCod;
 
 end //

 delimiter !!

-- Procedure para Listar os Produtos na página index.php

 create procedure ListarProdutos()
 
 begin
 
  select cdProd, nmProd, vlProd, ImgProd, qtEstoque from tbProdutos
  order by nmProd asc;
 
 end !!
 
 -- Procedure para Listar os Lançamentos
 
 delimiter $$

 create procedure ListarLancamentos()
 
 begin 
	
    select cdProd, nmProd,vlProd,ImgProd, qtEstoque from tbProdutos 
    where sgLancamento = 'S';
 
 end $$
 
 -- Procedure para listar produtos por categoria
 delimiter &&
 create procedure ListarCategorias(vdsCategoria varchar(25))
 
 begin
 
	select  cdProd,nmProd,vlProd,ImgProd, qtEstoque from vwProdDetalhes where dsCategoria = vdsCategoria;
 
 end &&
 
 -- Criando tabela de usuário
 
 create table tbUsuario(
 
 cdUsuario int primary key auto_increment,
 nmUsuario varchar(80) not null,
 dsEmail varchar(80) not null,
 dsSenha varchar(6) not null,
 dsStatus boolean not null,
 dsEndereco varchar(80) not null,
 dsCidade varchar(30)  not null,
 noCep char(9) not null

 ) default charset utf8;

 -- inserindo usuario
 insert into tbUsuario()
 values(default,"Xibison", "xibison@gmail.com", "123", 1,"R. das Gaivotas", "Rio Branco, AC", "35637-909");
 
  insert into tbUsuario()
 values(default,"Joabcledson", "Joabcledson@gmail.com", "123", 0,"R. Anapa", "Xique Xique, BA", "56890-321");
 
 -- criando procedure para verificar Usuario
 
 delimiter %%
 
 create procedure spVerificaUsuario(VdsEmail varchar(80), VdsSenha varchar(6) )
 
 begin
 
  select cdUsuario, nmUsuario, dsEmail, dsSenha, dsStatus from tbUsuario
  where dsEmail = VdsEmail and dsSenha = VdsSenha;
 
 end %%
 
 delimiter ;
 
 -- procedure para listar usuario por cod
 
 delimiter $$
 
 create procedure spListarUsuario(vCodUsu int)
 
 begin
 
 select * from tbUsuario where cdUsuario = vCodUsu;
 
 end $$
 
 delimiter ;
 -- procedure para mostrar Usuario logado
 
 delimiter **
 
 create procedure spMostraUsuario(vCodUsu int)

 begin
 
 select nmUsuario, imgUsuario from tbUsuario where cdUsuario = vCodUsu;

 end **
 
 delimiter ;
 
 -- criando procedure para Atualizar usuário
 delimiter $$

create procedure spAtualizarUsuario(_nmUsuario varchar(80), _dsEmail varchar(80), _dsEndereco varchar(80),
                                    _dsCidade varchar(30), _noCep char(9), _img varchar(255), _cd int)

begin

update tbUsuario set nmUsuario = _nmUsuario, dsEmail = _dsEmail, dsEndereco = _dsEndereco, 
dsCidade = _dsCidade, noCep =  _noCep, imgUsuario = _img
 where cdUsuario = _cd;

end $$

delimiter;
 -- procedure para verificar se o Email já está cadastrado
 
 delimiter %% 

 create procedure spVerificaEmail(VdsEmail varchar(80))

 begin
 
 select dsEmail from tbUsuario where dsEmail = VdsEmail;
 
 end %%
 
 delimiter ; 
 
 -- criando procedure para inserir novo Usuário
 
 delimiter $$

 create procedure spInserirUsuario(vnmUsuario varchar(80), vdsEmail varchar(80), vdsSenha varchar(6),  vdsStatus boolean, vdsEndereco varchar(80),  vdsCidade varchar(30), vnoCep char(9)  )
 
 begin
 
 insert into tbUsuario(nmUsuario,dsEmail,dsSenha,dsStatus,dsEndereco,dsCidade, noCep )
 values( vnmUsuario, vdsEmail, vdsSenha,vdsStatus,vdsEndereco, vdsCidade, vnoCep );

 end $$
 delimiter ;
 
 -- criando procedure para listar produto buscado
 
 delimiter %%
 
 create procedure spListaBuscado(VnmProd varchar(70))

 begin
 
 select cdProd, ImgProd, nmProd, vlProd from tbProdutos where nmProd like concat ("%",'a', "%" );
 
 end %%
 
 delimiter ; 
 
 -- criando procedure para listar as Categorias
 
 delimiter &&
 
 create procedure spListaCategoria()
 
 begin
 
 select * from tbCategoria;
 
 end &&
 
 delimiter ;
 
 -- criando procedure para cadastrar Produtos
 
 delimiter !!

 create procedure inserirProduto(VnmProd varchar(70), VvlProd decimal(6,2), VcdCategoria int , VqtEstoque int, VResumo text, Vimg varchar(255), Vlanc enum('S','N') )
 
 begin
 
 insert into tbProdutos(nmProd, vlProd,cdCategoria,qtEstoque,ResumoProd,ImgProd,sgLancamento)
 values(VnmProd, VvlProd, VcdCategoria, VqtEstoque, VResumo, Vimg,Vlanc);
 
 end !!

 delimiter ; 
 
 -- criando procedure para selecionar produtos pelo código
 
 delimiter %%
 
 create procedure spSelecionaProdCod(vcdProd int)
 
 begin
 
 SELECT * FROM tbProdutos WHERE cdProd= vcdProd;
 
 end %%
 

 delimiter ; 
 -- criando procedure de selecionar categoria pelo código
 delimiter $$
 
 create procedure spSelecionaCategoriaCod(vcdCategoria int, vcdCategoria2 int)
 
 begin
 
 select * from tbCategoria where cdCategoria = vcdCategoria
 union select * from tbCategoria where cdCategoria != vcdCategoria2;
 
 end $$
 delimiter ; 
 -- criando procedure para alterar produtos
 
 delimiter %%

 create procedure spAlteraProduto(VnmProd varchar(70), VvlProd decimal(6,2), VcdCategoria int, 
                                 VqtEstoque int, VresumoProd text, vImgProd varchar(255), 
								VsgLancamento enum('S', 'N'), VcdProd int)
 
 begin
 
 update tbProdutos set nmProd = VnmProd, vlProd = VvlProd, cdCategoria =  VcdCategoria, qtEstoque = VqtEstoque,
 ResumoProd =  VresumoProd, ImgProd = vImgProd, sgLancamento = VsgLancamento where cdProd =  VcdProd;
 
 end %%
 
 delimiter ; 
 -- criando procedure para excluir Produto
 
 delimiter %%
 
 create procedure spExcluiProduto(vCod int)
 
 begin
 
 delete  from tbProdutos where cdProd = vCod;
 
 end %%
 
 delimiter ; 
 
 -- criando tabela de Vendas
 
 create table tbVendas(
 
 cdVenda int(11) primary key auto_increment,
 noTicket varchar(13) not null,
 cdCliente int(11) not null, 
 cdProd int(11) not null,
 qtProd int(11) not null,
 vlItem decimal(10,2) not null,
 vlTotal decimal (10,2) generated always as ((qtProd * vlItem)) virtual,
 dt_venda date not null
 )default charset=utf8;
 
 -- criando procedure para inserir na tabela de Vendas
 
 delimiter $$

 create procedure spInserirVenda(VnoTicket varchar(13), VcdCliente int(11),VcdProd int(11),
                                VqtProd int(11), VvlItem decimal(10,2), Vdt_venda date )
 
 begin
 
 INSERT INTO tbVendas (noTicket, cdCliente, cdProd, qtProd, vlItem, dt_venda)
VALUES (VnoTicket, VcdCliente, VcdProd, VqtProd, VvlItem, Vdt_venda);

 end $$
 
 delimiter ;
 
 -- criando view para selecionar as vendas feitas pelo Usuário 
 create view vwVenda
 as select noTicket, qtProd, vlTotal, dt_venda, nmProd, cdCliente from tbVendas as TV
 Inner join TbProdutos as TP
 On TP.cdProd = TV.cdProd ;
 
 -- criando procedure para selecionar os tickets das vendas dos usuário
delimiter $$

create procedure spListaVendas(vCod int) 

begin

SELECT noTicket, MAX(dt_venda) AS max_dt_venda
FROM TbVendas
WHERE cdCliente = vCod
GROUP BY noTicket;
 
 end $$
 
 delimiter ;
 
 -- criando procedure para listar as vendas feitas pelos usuários
 
 delimiter $$
 
 create procedure spListarVendasUsu(vTicket varchar(13))
 
 begin
 
 select * from vwVenda where noTicket = vTicket;
 
 end $$
 
  delimiter ;
  
  
  -- criando tabela de Avaliação

  create table tbAvaliacao(
  
  cdAvali int primary key auto_increment,
  nomeAutor varchar (255) not null, -- nome de quem fez o comentário
  dataAva date not null,
  notaAva int not null,  
  comentarioAva text not null,
  cdAutor int not null,
  cdProd int not null,
 constraint fk_Prod foreign key (cdProd)  references tbprodutos(cdProd),
 constraint fk_Autor foreign key (cdAutor) references tbusuario(cdUsuario)
  
  );

  -- criando procedure para inserir avaliação

  delimiter $$
  
  create procedure spInsertAvali(
  _nmAutor varchar(255),
  _dtAva date,
  _notaAva int,
  _cmAva text,
  _cdAutor int,
  cdProd int
  )

  begin
  
  insert into tbAvaliacao(nomeAutor, dataAva,notaAva, comentarioAva,cdAutor,cdProd)
  values(_nmAutor,_dtAva,_notaAva,_cmAva,_cdAutor,cdProd);
  
  end $$

  delimiter ;


-- criando vw para mostrar comentário por autor
 create view vwAvaliacao
 as select nomeAutor, dataAva, notaAva, comentarioAva, cdUsuario, TP.cdProd, imgUsuario  from tbavaliacao as TA
 Inner join TbProdutos as TP
On TP.cdProd = TA.cdProd
 Inner Join TbUsuario as TU
 On TA.cdAutor = TU.cdUsuario;
 


-- criando procedure para listar comentários por autor usando a vw

delimiter $$


create procedure spSelectAvali( _cdProd int)

begin

select * from vwAvaliacao where cdProd = _cdProd;

end $$

delimiter ;

-- criando procedure para apagar avaliações
delimiter $$
CREATE PROCEDURE spDeleteAvali(_Cd int)
begin

delete from tbAvaliacao where cdAvali = _Cd ;

end $$

delimiter ;

-- criando procedure para mostrar a média de avaliações
delimiter $$
create procedure spmediaAvali(_Cd int)

begin

SELECT AVG(notaAva) AS media_notas  FROM tbAvaliacao where cdProd = _Cd;

end $$ 

delimiter ; 