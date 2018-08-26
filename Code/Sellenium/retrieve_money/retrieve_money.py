import unittest
from time import sleep

from selenium import webdriver
from test_utility import fields, static_data


class Payment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=smjfas", "password=smjfas",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "/profile/ret-mon")

    def test_ret_money(self):  # Assume Money > Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=1111222233334444", "price=10",
                                                    "submit"])[2].click()
        assert "successful" in self.driver.find_element_by_tag_name("body").text

    def test_ret_money_fail(self):  # Assume Money < Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=1111222233334444", "price=100000000",
                                                    "submit"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def test_pay_empty_payee(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["price=10",
                                                    "submit"])[1].click()
        assert "ret-mon" in self.driver.current_url

    def test_pay_empty_price(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=123456789",
                                                    "submit"])[1].click()
        assert "ret-mon" in self.driver.current_url

    def test_pay_price_format(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=123456789", "price=10fdg",
                                                    "submit"])[2].click()
        assert "ret-mon" in self.driver.current_url

    def test_pay_price_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=10000000000",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def test_pay_too_low(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["payee-id=1111222233334444", "price=-2",
                                               "submit"])[2].click()
        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
