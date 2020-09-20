/*SELECT SUM(moedas.VALOR_MOEDAS) AS  tota_moedas, DATE_FORMAT(moedas.DATA_CAD_MOEDAS, '%m/%Y') AS  data_ from moedas
    WHERE DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
    group BY data_
    order BY data_;
    
    
SELECT SUM(compras.VALOR_COMPRAS) AS  tota_compras, DATE_FORMAT(compras.DATA_CAD, '%m/%Y') AS  data_ from compras
    WHERE DATE_FORMAT(`DATA_CAD`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
    group BY data_
    order BY data_;
    
SELECT SUM(compras_pagamentos.TOTAL_COMPRA) AS  tota_compras_cartao, DATE_FORMAT(compras_pagamentos.DATA_CAD, '%m/%Y') AS  data_ from compras_pagamentos
    WHERE DATE_FORMAT(`DATA_CAD`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
    group BY data_
    order BY data_;*/
    
    
    

    
        SELECT (moedas.VALOR_MOEDAS) AS  tota_moedas,
      MONTH(DATA_CAD_MOEDAS) AS mes,
      DATE_FORMAT(DATA_CAD_MOEDAS, '%Y') AS data_completa,
      DATE_FORMAT(DATA_CAD_MOEDAS, '%m') AS mes_extenso
      from moedas
      WHERE DATE_FORMAT(`DATA_CAD_MOEDAS`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
      group BY data_completa, mes
      order BY  mes, data_completa
      
      
      SELECT DISTINCT data_completa
        FROM (
        SELECT SUM(kwh) kwh,
        DATE_FORMAT(DATA, '%Y') AS data_completa,
        DATE_FORMAT(DATA, '%m/%M') AS mes
        from lampada
        WHERE DATE_FORMAT(`data`, '%Y-%m') BETWEEN '2020-01' AND '2020-12'
        group BY data_completa, mes
        order BY  data_completa
       ) aux 
       
    
    

    
