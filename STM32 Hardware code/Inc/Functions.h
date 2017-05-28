#ifndef __FUNCTIONS_H
#define __FUNCTIONS_H

void resetDig(void);
void SplitDisplay(uint16_t split, uint16_t digit);
void DisplayDigit (uint16_t DigitNr, uint16_t digit);
void Uart(uint8_t Buffer[]);
void HAL_UART_TxCpltCallback(UART_HandleTypeDef *UartHandle);
void HAL_UART_RxCpltCallback(UART_HandleTypeDef *UartHandle);
void DisplayTest();

#endif