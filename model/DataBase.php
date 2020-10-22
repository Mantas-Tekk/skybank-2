<?php
declare(strict_types = 1);

namespace APP\DB;

interface DataBase
{
  function create​(array $userData): void;

  function update​(integer $userId, array $userData): void;

  function delete(integer $userId): void;

  function show​(integer $userId): array;

  function showAll​(): array;
}
