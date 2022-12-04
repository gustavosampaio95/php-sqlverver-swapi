#!/bin/bash

echo "Delay, aguardar SQL Server..."

sleep 30

echo "Executando scripts..."

/opt/mssql-tools/bin/sqlcmd -S "${DB_HOST}" -U "${DB_USER}" -P "${DB_PASS}" -d "${DB_BASE}" -i /tmp/01-base-starwars.sql