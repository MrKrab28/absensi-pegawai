import DataTable from 'datatables.net-dt';

DataTable.type('num', 'detect', () => false);
DataTable.type('num-fmt', 'detect', () => false);
DataTable.type('html-num', 'detect', () => false);
DataTable.type('html-num-fmt', 'detect', () => false);

window.DataTable = DataTable;
