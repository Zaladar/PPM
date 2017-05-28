#include "main.h"
#include "stdint.h"
#include "stm32f3xx_hal.h"
#include "gpio.h"
#include "Functions.h"
#include "usart.h"



/* Size of Transmission buffer */
#define BUFFERSIZE 6
ITStatus UartReady = RESET;
uint8_t Tecken;

/* Resetting the display */

/**
* @brief Tx Transfer completed callback
* @param UartHandle: UART handle.
* @note This example shows a simple way to report end of IT Tx transfer, and
* you can add your own implementation.
* @retval None
*/
void HAL_UART_TxCpltCallback(UART_HandleTypeDef *UartHandle)
{
	/* Set transmission flag: transfer complete*/
	UartReady = SET;
	
}

/**
* @brief Rx Transfer completed callback
* @param UartHandle: UART handle
* @note This example shows a simple way to report end of IT Rx transfer, and
* you can add your own implementation.
* @retval None
*/
void HAL_UART_RxCpltCallback(UART_HandleTypeDef *UartHandle)
{
	/* Set transmission flag: trasfer complete*/
	UartReady = SET;
	
}

/* Setting up UART to fill buffer */
void Uart(uint8_t *Buffer){
	
	//HAL_UART_Receive(&huart3, &Tecken, 1, 5000);
	//HAL_UART_Transmit(&huart3, &Tecken, 1, 5000);
	/* USER CODE BEGIN 3 */
	if (HAL_UART_Receive(&huart3, &Tecken, 1, 5000) != HAL_OK)
	{
		Error_Handler();
	}
	if (HAL_UART_Transmit(&huart3, &Tecken, 1, 5000) != HAL_OK)
	{
		Error_Handler();
	}
	
	/* Start the transmission process */
	if(HAL_UART_Transmit_IT(&huart3, (uint8_t *)Buffer, BUFFERSIZE)!= HAL_OK)
	{
		Error_Handler();
	}
	
	/* Wait for the end of the transfer */
	while (UartReady != SET)
	{
	}
	/* Reset transmission flag */
	UartReady = RESET;
	
	/* Put UART peripheral in reception process */
	if(HAL_UART_Receive_IT(&huart3, (uint8_t *)Buffer, BUFFERSIZE) != HAL_OK)
	{
		Error_Handler();
	}
	
	/* Wait for the end of the transfer */
	while (UartReady != SET)
	{
	}
	
	/* Reset transmission flag */
	UartReady = RESET;
}

