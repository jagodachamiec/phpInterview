SELECT book.title, COUNT(rent.rent_date) as counter
FROM book LEFT OUTER JOIN rent
ON book.book_id = rent.book_id
WHERE YEAR(rent.rent_date) = '2008' OR rent.rent_id IS NULL
GROUP BY book.book_id;