import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys


class Contact_SQL_injection(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_sql_injection(self):
        driver = self.driver
        driver.get("http://192.168.202.227/contact")
        family_name = driver.find_element_by_id("family")
        email = driver.find_element_by_id("email")
        name = driver.find_element_by_id("name")
        username = driver.find_element_by_id("username")
        cellphone_number = driver.find_element_by_id("cellphone")
        message = driver.find_element_by_id("message")
        captcha = driver.find_element_by_id("captcha")
        submit = driver.find_element_by_id("submit")

        # incorrect email
        name.send_keys("feyz")
        family_name.send_keys("select * from user_table")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        username.send_keys("smjfas")  # username
        cellphone_number.send_keys("09398604014")  # cellnum
        message.send_keys("this is a test message from Sellenium")  # address
        captcha.send_keys("7736")  # captcha
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()

