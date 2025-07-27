<?php

namespace App\Infrastructure\Repositories;

use App\Domains\Transacao\Interfaces\TransacaoRepositoryInterface;
use App\Models\Transacao;
use Illuminate\Support\Facades\DB;

class TransacaoRepository implements TransacaoRepositoryInterface
{
    public function listarTodos(array $parametros = []) : array
    {  
        $filtros = '1=1';
        
        if (isset($parametros['id']) && $parametros['id']) {
            $filtros .= " AND t.id = {$parametros['id']}";
        }

        if (isset($parametros['usuario_id']) && $parametros['usuario_id']) {
            $filtros .= " AND t.user_id = {$parametros['usuario_id']}";
        }

        $query = <<<SQL
            SELECT 
                t.id,
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
            FROM transacoes t
            WHERE {$filtros};
        SQL;

        return DB::select($query);
    }

    public function porUsuario(int $id): array
    {
        return $this->listarTodos(['usuario_id' => $id]);
    }

    public function salvar(array $entradas): void
    {
        $query = <<<SQL
            INSERT INTO transacoes ("data", tipo, descricao, valor, categoria, repeticao, fixo, user_id)
            VALUES (:data, :tipo, :descricao, :valor, :categoria, :repeticao, :fixo, :user_id)
        SQL;
        DB::insert($query, $entradas);
    }

    public function encontrarPorId(int $id): ?Object
    {
        $query = <<<SQL
            SELECT 
                t.id,
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
            FROM transacoes t
            WHERE t.id = :id
            LIMIT 1;
        SQL;

        return DB::selectOne($query, ['id' => $id]);
    }

    public function atualizar(int $id, array $entradas): void
    {
        $entradas['id'] = $id;
        $query = <<<SQL
            UPDATE transacoes 
            SET 
                "data" = :data, 
                tipo = :tipo, 
                descricao = :descricao, 
                valor = :valor, 
                categoria = :categoria, 
                repeticao = :repeticao, 
                fixo = :fixo, 
                user_id = :user_id
            WHERE id = :id;
        SQL;

        DB::update($query, $entradas);
    }


    public function deletar(int $id): void 
    {
        $query = <<<SQL
            DELETE FROM transacoes WHERE id = {$id}
        SQL;

        DB::delete($query);
    }
}