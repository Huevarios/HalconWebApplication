# Halcon Web Application

## Description

Halcon Web Application is a web application designed for a construction material distributor. Its purpose is to manage the internal order process and allow customers to check the status of their orders.

Customers can check an order using their **customer number** and **invoice number**. The system displays the current status of the order and, when the order has been delivered, the delivery evidence.

## Order Status

The application manages the following order statuses:

- **Ordered:** The order has been registered by the Sales department.
- **In Process:** The Warehouse department is preparing the order or Purchasing is obtaining missing materials.
- **In Route:** The order is ready and has been assigned for delivery.
- **Delivered:** The order has been delivered to the customer.

## User Roles

The administrative system includes the following roles:

- **Administrator:** Creates users and assigns roles.
- **Sales:** Registers customer orders.
- **Purchasing:** Manages the purchase of materials that are not in stock.
- **Warehouse:** Manages stock and prepares orders for delivery.
- **Route:** Delivers orders and uploads photographic evidence.

## Main Features

- Customer order tracking.
- Order management.
- Order status updates.
- User and role management.
- Upload of photographic evidence.
- Search orders by invoice number, customer number, date, or status.
- Logical deletion of orders.
- Restore deleted orders.

## Project

This repository contains the analysis, design, and development of the Halcon Web Application for the Web Application Design course.