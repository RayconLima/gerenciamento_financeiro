
SELECT 
	t.DATA AS periodo,
	t.tipo,
	t.descricao,
	t.valor,
	t.categoria,
	t.repeticao,
	t.fixo,
	t.user_id,
	t.created_at,
	t.updated_at
FROM transacoes t;

insert into transacoes (data, tipo, descricao, valor, categoria, repeticao, fixo, user_id) 
values ('2025-07-28', 'receita', 'Venda de produto', 100.00, 'Vendas', true, true, 1);

update transacoes 
set "data" = '2025-07-29', tipo = 'despesa', descricao = 'Compra de material', valor = 50.00, 
	categoria = 'Compras', repeticao = false, fixo = false, user_id = 1
where id = 2;

select * from transacoes where id = 2;
select * From transacoes;

select * from users;

