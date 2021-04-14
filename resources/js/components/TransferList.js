import React from 'react';

const TransferList = ({transfers}) =>(
    <table className="table">
        <tbody>
            {transfers.map((transfer)=>(
                <tr key = {transfer.id} >
                <td>{transfer.description}</td>
                <td className={transfer.monto > 0 ? 'text-success' : 'text-danger'}>
                    {transfer.monto}</td>
            </tr>
            ))}
        </tbody>
        </table>
)

export default TransferList;
